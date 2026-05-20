@extends('layouts.app')

@section('title', 'Chi tiết danh mục công việc')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Chi tiết danh mục công việc</h1>
            <a class="button secondary" href="{{ route('task-categories.edit', $taskCategory) }}">Sửa</a>
        </div>

        <section class="panel">
            <p><strong>Tên danh mục:</strong> {{ $taskCategory->name }}</p>
            <p><strong>Mô tả:</strong> {{ $taskCategory->description ?: 'Chưa có mô tả' }}</p>
            <p><strong>Màu:</strong> {{ $taskCategory->color ?: 'Chưa chọn' }}</p>
            <p><strong>Trạng thái:</strong> {{ $taskCategory->status === 'active' ? 'Đang hoạt động' : 'Ngừng hoạt động' }}</p>
            <p><strong>Số công việc:</strong> {{ $taskCategory->tasks_count }}</p>
        </section>

        <p style="margin-top: 16px;">
            <a class="button light" href="{{ route('task-categories.index') }}">Quay lại</a>
        </p>
    </main>
@endsection
