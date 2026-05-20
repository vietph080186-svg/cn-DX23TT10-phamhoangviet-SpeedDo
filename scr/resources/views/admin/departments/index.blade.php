@extends('layouts.app')

@section('title', 'Quản lý phòng ban')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Quản lý phòng ban</h1>
            <a class="button" href="{{ route('admin.departments.create') }}">Thêm phòng ban</a>
        </div>

        @include('admin.shared.messages')

        <form class="panel" method="GET" action="{{ route('admin.departments.index') }}">
            <div class="form-grid">
                <div class="form-group">
                    <label for="search">Tìm theo tên</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}">
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
            <a class="button light" href="{{ route('admin.departments.index') }}">Xóa lọc</a>
        </form>

        <table style="margin-top: 16px;">
            <thead>
                <tr>
                    <th>Tên phòng ban</th>
                    <th>Trạng thái</th>
                    <th>Số người dùng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->status === 'active' ? 'Đang hoạt động' : 'Ngừng hoạt động' }}</td>
                        <td>{{ $department->users_count }}</td>
                        <td class="actions">
                            <a class="button light" href="{{ route('admin.departments.show', $department) }}">Xem</a>
                            <a class="button secondary" href="{{ route('admin.departments.edit', $department) }}">Sửa</a>
                            <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" onsubmit="return confirm('Bạn có chắc muốn xóa phòng ban này?')">
                                @csrf
                                @method('DELETE')
                                <button class="button danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Chưa có phòng ban phù hợp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">{{ $departments->links() }}</div>
    </main>
@endsection
