@extends('layouts.app')

@section('title', 'Chi tiết phòng ban')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Chi tiết phòng ban</h1>
            <a class="button secondary" href="{{ route('admin.departments.edit', $department) }}">Sửa</a>
        </div>

        <section class="panel">
            <p><strong>Tên phòng ban:</strong> {{ $department->name }}</p>
            <p><strong>Mô tả:</strong> {{ $department->description ?: 'Chưa có mô tả' }}</p>
            <p><strong>Trạng thái:</strong> {{ $department->status === 'active' ? 'Đang hoạt động' : 'Ngừng hoạt động' }}</p>
            <p><strong>Số người dùng:</strong> {{ $department->users_count }}</p>
        </section>

        <p style="margin-top: 16px;">
            <a class="button light" href="{{ route('admin.departments.index') }}">Quay lại</a>
        </p>
    </main>
@endsection
