@extends('layouts.app')

@section('title', 'Bảng điều khiển quản trị')

@section('content')
    <main class="container">
        <h1 class="page-title">Bảng điều khiển quản trị</h1>

        <section class="grid">
            <article class="card">
                <p class="card-title">Tổng người dùng</p>
                <p class="card-number">{{ $totalUsers }}</p>
            </article>

            <article class="card">
                <p class="card-title">Tổng phòng ban</p>
                <p class="card-number">{{ $totalDepartments }}</p>
            </article>

            <article class="card">
                <p class="card-title">Tổng dự án</p>
                <p class="card-number">{{ $totalProjects }}</p>
            </article>

            <article class="card">
                <p class="card-title">Tổng công việc</p>
                <p class="card-number">{{ $totalTasks }}</p>
            </article>

            <article class="card">
                <p class="card-title">Công việc hoàn thành</p>
                <p class="card-number">{{ $completedTasks }}</p>
            </article>

            <article class="card">
                <p class="card-title">Công việc quá hạn</p>
                <p class="card-number">{{ $overdueTasks }}</p>
            </article>
        </section>

        <p style="margin-top: 16px;">
            <a class="button" href="{{ route('reports.index') }}">Xem báo cáo</a>
        </p>
    </main>
@endsection
