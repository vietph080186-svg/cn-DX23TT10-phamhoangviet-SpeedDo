@extends('layouts.app')

@section('title', 'Báo cáo dự án')

@section('content')
    <main class="container">
        <h1 class="page-title">Báo cáo dự án</h1>
        @include('reports.nav')
        @include('reports.filters')

        <table>
            <thead>
                <tr>
                    <th>Dự án</th>
                    <th>Tổng công việc</th>
                    <th>Hoàn thành</th>
                    <th>Đang làm</th>
                    <th>Quá hạn</th>
                    <th>Tỷ lệ hoàn thành</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projectsReport as $project)
                    @php
                        $projectTasks = $tasks->where('project_id', $project->id);
                        $total = $projectTasks->count();
                        $completed = $projectTasks->where('status', 'completed')->count();
                        $rate = $total > 0 ? round($completed / $total * 100) : 0;
                        $overdue = $projectTasks->filter(fn ($task) => $task->due_date && $task->due_date->isPast() && $task->status !== 'completed')->count();
                    @endphp
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $total }}</td>
                        <td>{{ $completed }}</td>
                        <td>{{ $projectTasks->where('status', 'in_progress')->count() }}</td>
                        <td>{{ $overdue }}</td>
                        <td>
                            {{ $rate }}%
                            <div class="progress"><div class="progress-bar" style="width: {{ $rate }}%;"></div></div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Chưa có dữ liệu phù hợp.</td></tr>
                @endforelse
            </tbody>
        </table>
    </main>
@endsection
