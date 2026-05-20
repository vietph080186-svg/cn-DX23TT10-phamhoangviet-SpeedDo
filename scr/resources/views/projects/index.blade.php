@extends('layouts.app')

@section('title', 'Quản lý dự án')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Quản lý dự án</h1>
            <a class="button" href="{{ route('projects.create') }}">Thêm dự án</a>
        </div>

        @include('admin.shared.messages')

        <form class="panel" method="GET" action="{{ route('projects.index') }}">
            <div class="form-grid">
                <div class="form-group">
                    <label for="search">Tìm theo tên</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status">
                        <option value="">Tất cả</option>
                        <option value="planning" @selected(request('status') === 'planning')>Lên kế hoạch</option>
                        <option value="active" @selected(request('status') === 'active')>Đang thực hiện</option>
                        <option value="paused" @selected(request('status') === 'paused')>Tạm dừng</option>
                        <option value="completed" @selected(request('status') === 'completed')>Hoàn thành</option>
                        <option value="cancelled" @selected(request('status') === 'cancelled')>Đã hủy</option>
                    </select>
                </div>
            </div>
            <button class="button" type="submit">Lọc</button>
            <a class="button light" href="{{ route('projects.index') }}">Xóa lọc</a>
        </form>

        <table style="margin-top: 16px;">
            <thead>
                <tr>
                    <th>Tên dự án</th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                    <th>Số công việc</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>
                            {{ $project->start_date?->format('d/m/Y') ?? 'Chưa có' }}
                            -
                            {{ $project->end_date?->format('d/m/Y') ?? 'Chưa có' }}
                        </td>
                        <td>{{ [
                            'planning' => 'Lên kế hoạch',
                            'active' => 'Đang thực hiện',
                            'paused' => 'Tạm dừng',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Đã hủy',
                        ][$project->status] ?? $project->status }}</td>
                        <td>{{ $project->tasks_count }}</td>
                        <td class="actions">
                            <a class="button light" href="{{ route('projects.show', $project) }}">Xem</a>
                            <a class="button secondary" href="{{ route('projects.edit', $project) }}">Sửa</a>
                            <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Bạn có chắc muốn xóa dự án này?')">
                                @csrf
                                @method('DELETE')
                                <button class="button danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Chưa có dự án phù hợp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">{{ $projects->links() }}</div>
    </main>
@endsection
