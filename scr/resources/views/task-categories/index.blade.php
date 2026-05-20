@extends('layouts.app')

@section('title', 'Quản lý danh mục công việc')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Quản lý danh mục công việc</h1>
            <a class="button" href="{{ route('task-categories.create') }}">Thêm danh mục</a>
        </div>

        @include('admin.shared.messages')

        <form class="panel" method="GET" action="{{ route('task-categories.index') }}">
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
            <a class="button light" href="{{ route('task-categories.index') }}">Xóa lọc</a>
        </form>

        <table style="margin-top: 16px;">
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Màu</th>
                    <th>Trạng thái</th>
                    <th>Số công việc</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($taskCategories as $taskCategory)
                    <tr>
                        <td>{{ $taskCategory->name }}</td>
                        <td>
                            @if ($taskCategory->color)
                                <span style="display:inline-block;width:20px;height:20px;border-radius:4px;background:{{ $taskCategory->color }};border:1px solid #cbd5e1;"></span>
                                {{ $taskCategory->color }}
                            @else
                                Chưa chọn
                            @endif
                        </td>
                        <td>{{ $taskCategory->status === 'active' ? 'Đang hoạt động' : 'Ngừng hoạt động' }}</td>
                        <td>{{ $taskCategory->tasks_count }}</td>
                        <td class="actions">
                            <a class="button light" href="{{ route('task-categories.show', $taskCategory) }}">Xem</a>
                            <a class="button secondary" href="{{ route('task-categories.edit', $taskCategory) }}">Sửa</a>
                            <form method="POST" action="{{ route('task-categories.destroy', $taskCategory) }}" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                                @csrf
                                @method('DELETE')
                                <button class="button danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Chưa có danh mục phù hợp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">{{ $taskCategories->links() }}</div>
    </main>
@endsection
