@extends('layouts.app')

@section('title', 'Báo cáo người dùng')

@section('content')
    <main class="container">
        <h1 class="page-title">Báo cáo người dùng</h1>
        @include('reports.nav')
        @include('reports.filters')

        <table>
            <thead>
                <tr>
                    <th>Nhân viên</th>
                    <th>Phòng ban</th>
                    <th>Tổng công việc</th>
                    <th>Hoàn thành</th>
                    <th>Đang làm</th>
                    <th>Chờ duyệt</th>
                    <th>Quá hạn</th>
                    <th>Tỷ lệ hoàn thành</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staffUsers as $staff)
                    @php
                        $userTasks = $tasks->where('assignee_id', $staff->id);
                        $total = $userTasks->count();
                        $completed = $userTasks->where('status', 'completed')->count();
                        $rate = $total > 0 ? round($completed / $total * 100) : 0;
                        $overdue = $userTasks->filter(fn ($task) => $task->due_date && $task->due_date->isPast() && $task->status !== 'completed')->count();
                    @endphp
                    <tr>
                        <td>{{ $staff->full_name }}</td>
                        <td>{{ $staff->department?->name ?? 'Chưa có' }}</td>
                        <td>{{ $total }}</td>
                        <td>{{ $completed }}</td>
                        <td>{{ $userTasks->where('status', 'in_progress')->count() }}</td>
                        <td>{{ $userTasks->where('status', 'review')->count() }}</td>
                        <td>{{ $overdue }}</td>
                        <td>
                            {{ $rate }}%
                            <div class="progress"><div class="progress-bar" style="width: {{ $rate }}%;"></div></div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8">Chưa có dữ liệu phù hợp.</td></tr>
                @endforelse
            </tbody>
        </table>
    </main>
@endsection
