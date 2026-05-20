<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::withCount('tasks')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Project::create($this->validatedData($request));

        return redirect()->route('projects.index')
            ->with('success', 'Đã thêm dự án thành công.');
    }

    public function show(Project $project)
    {
        $project->loadCount('tasks');

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($this->validatedData($request));

        return redirect()->route('projects.index')
            ->with('success', 'Đã cập nhật dự án thành công.');
    }

    public function destroy(Project $project)
    {
        if ($project->tasks()->exists()) {
            return back()->with('error', 'Không thể xóa dự án đang có công việc.');
        }

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Đã xóa dự án thành công.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'status' => ['required', Rule::in(['planning', 'active', 'paused', 'completed', 'cancelled'])],
        ], [
            'name.required' => 'Vui lòng nhập tên dự án.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ]);
    }
}
