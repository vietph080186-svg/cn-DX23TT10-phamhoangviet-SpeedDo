@extends('layouts.app')

@section('title', 'Báo cáo tổng quan')

@section('content')
    <main class="container">
        <h1 class="page-title">Báo cáo tổng quan</h1>
        @include('reports.nav')
        @include('reports.filters')

        <section class="grid">
            <article class="card"><p class="card-title">Tổng số công việc</p><p class="card-number">{{ $stats['total'] }}</p></article>
            <article class="card"><p class="card-title">Công việc mới giao</p><p class="card-number">{{ $stats['new'] }}</p></article>
            <article class="card"><p class="card-title">Công việc đang làm</p><p class="card-number">{{ $stats['in_progress'] }}</p></article>
            <article class="card"><p class="card-title">Công việc chờ duyệt</p><p class="card-number">{{ $stats['review'] }}</p></article>
            <article class="card"><p class="card-title">Công việc hoàn thành</p><p class="card-number">{{ $stats['completed'] }}</p></article>
            <article class="card"><p class="card-title">Công việc cần sửa lại</p><p class="card-number">{{ $stats['revision'] }}</p></article>
            <article class="card"><p class="card-title">Công việc quá hạn</p><p class="card-number">{{ $stats['overdue'] }}</p></article>
            <article class="card">
                <p class="card-title">Tỷ lệ hoàn thành</p>
                <p class="card-number">{{ $stats['completionRate'] }}%</p>
                <div class="progress"><div class="progress-bar" style="width: {{ $stats['completionRate'] }}%;"></div></div>
            </article>
        </section>

        <section class="grid" style="margin-top: 16px;">
            <article class="panel">
                <h2>Thống kê theo trạng thái</h2>
                @include('reports.bars', ['items' => $statusCounts])
            </article>
            <article class="panel">
                <h2>Thống kê theo mức ưu tiên</h2>
                @include('reports.bars', ['items' => $priorityCounts])
            </article>
        </section>
    </main>
@endsection
