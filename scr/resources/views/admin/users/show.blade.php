@extends('layouts.app')

@section('title', 'Chi tiết người dùng')

@section('content')
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Chi tiết người dùng</h1>
            <a class="button secondary" href="{{ route('admin.users.edit', $user) }}">Sửa</a>
        </div>

        <section class="panel">
            <p><strong>Họ tên:</strong> {{ $user->full_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $user->phone ?: 'Chưa cập nhật' }}</p>
            <p><strong>Vai trò:</strong> {{ $user->role?->name }}</p>
            <p><strong>Phòng ban:</strong> {{ $user->department?->name }}</p>
            <p><strong>Trạng thái:</strong> {{ $user->status === 'active' ? 'Đang hoạt động' : 'Ngừng hoạt động' }}</p>
        </section>

        <p style="margin-top: 16px;">
            <a class="button light" href="{{ route('admin.users.index') }}">Quay lại</a>
        </p>
    </main>
@endsection
