@extends('layouts.app')

@section('title', 'Chi tiết dự án')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Chi tiết dự án</h1>
            <a class="button secondary" href="{{ route('projects.edit', $project) }}">Sửa</a>
        </div>

        <section class="panel">
            <p><strong>Tên dự án:</strong> {{ $project->name }}</p>
            <p><strong>Mô tả:</strong> {{ $project->description ?: 'Chưa có mô tả' }}</p>
            <p><strong>Ngày bắt đầu:</strong> {{ $project->start_date?->format('d/m/Y') ?? 'Chưa có' }}</p>
            <p><strong>Ngày kết thúc:</strong> {{ $project->end_date?->format('d/m/Y') ?? 'Chưa có' }}</p>
            <p><strong>Trạng thái:</strong> {{ [
                'planning' => 'Lên kế hoạch',
                'active' => 'Đang thực hiện',
                'paused' => 'Tạm dừng',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã hủy',
            ][$project->status] ?? $project->status }}</p>
            <p><strong>Số công việc:</strong> {{ $project->tasks_count }}</p>
        </section>

        <p style="margin-top: 16px;">
            <a class="button light" href="{{ route('projects.index') }}">Quay lại</a>
        </p>
    </main>
@endsection
