@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
    <main class="login-page">
        <section class="login-hero" aria-label="Giới thiệu hệ thống">
            <div class="login-hero-content">
                <p class="login-kicker">NỀN TẢNG LÀM VIỆC NHÓM</p>
                <h1>SpeedDo</h1>
                <h2>Hệ thống quản lý giao việc</h2>
                <p class="login-hero-text">Giao việc rõ ràng, theo dõi tiến độ hiệu quả và kết nối công việc của nhóm trong một hệ thống thống nhất.</p>
                <p class="login-hero-note">Đơn giản, rõ ràng và phù hợp cho quản lý công việc hằng ngày.</p>
            </div>

            <div class="login-team-illustration" aria-hidden="true">
                <svg viewBox="0 0 360 260" focusable="false">
                    <defs>
                        <linearGradient id="teamLine" x1="104" y1="160" x2="274" y2="82" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#2563eb"/>
                            <stop offset="1" stop-color="#22c55e"/>
                        </linearGradient>
                    </defs>
                    <rect x="52" y="56" width="256" height="154" rx="30" fill="rgba(255,255,255,.7)"/>
                    <path d="M104 158 L164 128 L216 118 L274 82" fill="none" stroke="url(#teamLine)" stroke-width="9" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M250 84 L278 80 L268 106" fill="none" stroke="#22c55e" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                    <g fill="#2563eb">
                        <circle cx="118" cy="130" r="16"/>
                        <path d="M88 180c8-34 52-34 60 0z"/>
                    </g>
                    <g fill="#1d4ed8">
                        <circle cx="180" cy="116" r="18"/>
                        <path d="M146 180c9-38 59-38 68 0z"/>
                    </g>
                    <g fill="#0f766e">
                        <circle cx="242" cy="130" r="16"/>
                        <path d="M212 180c8-34 52-34 60 0z"/>
                    </g>
                </svg>
            </div>
        </section>

        <section id="login-form" class="login-box">
            <h2 class="page-title">Đăng nhập</h2>
            <p class="login-subtitle">Chào mừng bạn quay trở lại</p>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <label class="checkbox-row">
                    <input type="checkbox" name="remember" value="1">
                    <span>Ghi nhớ đăng nhập</span>
                </label>

                <button class="button" type="submit">Đăng nhập</button>
            </form>
        </section>
    </main>
@endsection
