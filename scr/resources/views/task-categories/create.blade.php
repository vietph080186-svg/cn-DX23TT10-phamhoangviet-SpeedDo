@extends('layouts.app')

@section('title', 'Thêm danh mục công việc')

@section('content')
    <main class="container">
        <h1 class="page-title">Thêm danh mục công việc</h1>
        <form class="panel" method="POST" action="{{ route('task-categories.store') }}">
            @include('task-categories.form')
        </form>
    </main>
@endsection
