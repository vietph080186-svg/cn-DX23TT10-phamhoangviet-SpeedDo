@extends('layouts.app')

@section('title', 'Bảng điều khiển quản trị')

@section('content')
    <main class="container">
        <h1 class="page-title">Bảng điều khiển quản trị</h1>

        <section class="stats-grid">
            <article class="stat-card stat-card-primary">
                <span class="stat-icon">@include('shared.icon', ['name' => 'users'])</span>
                <p class="stat-label">Tổng người dùng</p>
                <p class="stat-value">{{ $totalUsers }}</p>
            </article>

            <article class="stat-card stat-card-primary">
                <span class="stat-icon">@include('shared.icon', ['name' => 'building'])</span>
                <p class="stat-label">Tổng phòng ban</p>
                <p class="stat-value">{{ $totalDepartments }}</p>
            </article>

            <article class="stat-card stat-card-primary">
                <span class="stat-icon">@include('shared.icon', ['name' => 'folder'])</span>
                <p class="stat-label">Tổng dự án</p>
                <p class="stat-value">{{ $totalProjects }}</p>
            </article>

            <article class="stat-card stat-card-primary">
                <span class="stat-icon">@include('shared.icon', ['name' => 'tasks'])</span>
                <p class="stat-label">Tổng công việc</p>
                <p class="stat-value">{{ $totalTasks }}</p>
            </article>

            <article class="stat-card stat-card-success">
                <span class="stat-icon">@include('shared.icon', ['name' => 'check'])</span>
                <p class="stat-label">Công việc hoàn thành</p>
                <p class="stat-value">{{ $completedTasks }}</p>
            </article>

            <article class="stat-card stat-card-warning">
                <span class="stat-icon">@include('shared.icon', ['name' => 'warning'])</span>
                <p class="stat-label">Công việc quá hạn</p>
                <p class="stat-value">{{ $overdueTasks }}</p>
            </article>
        </section>

        @include('dashboards.shortcuts')
    </main>
@endsection
