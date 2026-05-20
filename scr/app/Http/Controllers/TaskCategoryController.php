<?php

namespace App\Http\Controllers;

use App\Models\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskCategoryController extends Controller
{
    public function index(Request $request)
    {
        $taskCategories = TaskCategory::withCount('tasks')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('task-categories.index', compact('taskCategories'));
    }

    public function create()
    {
        return view('task-categories.create');
    }

    public function store(Request $request)
    {
        TaskCategory::create($this->validatedData($request));

        return redirect()->route('task-categories.index')
            ->with('success', 'Đã thêm danh mục công việc thành công.');
    }

    public function show(TaskCategory $taskCategory)
    {
        $taskCategory->loadCount('tasks');

        return view('task-categories.show', compact('taskCategory'));
    }

    public function edit(TaskCategory $taskCategory)
    {
        return view('task-categories.edit', compact('taskCategory'));
    }

    public function update(Request $request, TaskCategory $taskCategory)
    {
        $taskCategory->update($this->validatedData($request, $taskCategory));

        return redirect()->route('task-categories.index')
            ->with('success', 'Đã cập nhật danh mục công việc thành công.');
    }

    public function destroy(TaskCategory $taskCategory)
    {
        if ($taskCategory->tasks()->exists()) {
            return back()->with('error', 'Không thể xóa danh mục đang có công việc.');
        }

        $taskCategory->delete();

        return redirect()->route('task-categories.index')
            ->with('success', 'Đã xóa danh mục công việc thành công.');
    }

    private function validatedData(Request $request, ?TaskCategory $taskCategory = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('task_categories', 'name')->ignore($taskCategory),
            ],
            'description' => ['nullable', 'max:255'],
            'color' => ['nullable', 'max:20'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'status.required' => 'Vui lòng chọn trạng thái.',
        ]);
    }
}
