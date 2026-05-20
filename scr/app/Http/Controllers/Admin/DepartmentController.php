<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::withCount('users')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        Department::create($this->validatedData($request));

        return redirect()->route('admin.departments.index')
            ->with('success', 'Đã thêm phòng ban thành công.');
    }

    public function show(Department $department)
    {
        $department->loadCount('users');

        return view('admin.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->update($this->validatedData($request, $department));

        return redirect()->route('admin.departments.index')
            ->with('success', 'Đã cập nhật phòng ban thành công.');
    }

    public function destroy(Department $department)
    {
        if ($department->users()->exists()) {
            return back()->with('error', 'Không thể xóa phòng ban đang có người dùng.');
        }

        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Đã xóa phòng ban thành công.');
    }

    private function validatedData(Request $request, ?Department $department = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('departments', 'name')->ignore($department),
            ],
            'description' => ['nullable', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ], [
            'name.required' => 'Vui lòng nhập tên phòng ban.',
            'name.unique' => 'Tên phòng ban đã tồn tại.',
            'status.required' => 'Vui lòng chọn trạng thái.',
        ]);
    }
}
