@extends('layouts.app')

@section('title', 'Báo cáo công việc')

@section('content')
    <main class="container">
        <h1 class="page-title">Báo cáo công việc</h1>
        @include('reports.nav')
        @include('reports.filters')

        <section class="grid">
            <article class="panel">
                <h2>Theo trạng thái</h2>
                @include('reports.bars', ['items' => $statusCounts])
            </article>
            <article class="panel">
                <h2>Theo mức ưu tiên</h2>
                @include('reports.bars', ['items' => $priorityCounts])
            </article>
            <article class="panel">
                <h2>Theo dự án</h2>
                @include('reports.bars', ['items' => $projectCounts->map(fn ($count, $label) => ['label' => $label ?: 'Chưa có', 'count' => $count])])
            </article>
            <article class="panel">
                <h2>Theo người được giao</h2>
                @include('reports.bars', ['items' => $assigneeCounts->map(fn ($count, $label) => ['label' => $label ?: 'Chưa có', 'count' => $count])])
            </article>
            <article class="panel">
                <h2>Theo phòng ban</h2>
                @include('reports.bars', ['items' => $departmentCounts->map(fn ($count, $label) => ['label' => $label ?: 'Chưa có', 'count' => $count])])
            </article>
            <article class="card">
                <p class="card-title">Công việc quá hạn</p>
                <p class="card-number">{{ $overdueCount }}</p>
            </article>
        </section>
    </main>
@endsection
