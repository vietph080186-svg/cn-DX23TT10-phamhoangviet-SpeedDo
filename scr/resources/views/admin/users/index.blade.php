@extends('layouts.app')

@section('title', 'Quản lý người dùng')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Quản lý người dùng</h1>
            <a class="button" href="{{ route('admin.users.create') }}">Thêm người dùng</a>
        </div>

        @include('admin.shared.messages')

        <form class="panel" method="GET" action="{{ route('admin.users.index') }}">
            <div class="form-grid">
                <div class="form-group">
                    <label for="search">Tìm theo tên hoặc email</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}">
                </div>
                <div class="form-group">
                    <label for="role_id">Vai trò</label>
                    <select id="role_id" name="role_id">
                        <option value="">Tất cả</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected((string) request('role_id') === (string) $role->id)>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Phòng ban</label>
                    <select id="department_id" name="department_id">
                        <option value="">Tất cả</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @selected((string) request('department_id') === (string) $department->id)>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status">
                        <option value="">Tất cả</option>
                        <option value="active" @selected(request('status') === 'active')>Đang hoạt động</option>
                        <option value="inactive" @selected(request('status') === 'inactive')>Ngừng hoạt động</option>
                    </select>
                </div>
            </div>
            <button class="button" type="submit">Lọc</button>
            <a class="button light" href="{{ route('admin.users.index') }}">Xóa lọc</a>
        </form>

        <table style="margin-top: 16px;">
            <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Phòng ban</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role?->name }}</td>
                        <td>{{ $user->department?->name }}</td>
                        <td>{{ $user->status === 'active' ? 'Đang hoạt động' : 'Ngừng hoạt động' }}</td>
                        <td class="actions">
                            <a class="button light" href="{{ route('admin.users.show', $user) }}">Xem</a>
                            <a class="button secondary" href="{{ route('admin.users.edit', $user) }}">Sửa</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?')">
                                @csrf
                                @method('DELETE')
                                <button class="button danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Chưa có người dùng phù hợp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">{{ $users->links() }}</div>
    </main>
@endsection
