@extends('layouts.app')

@section('title', 'Sửa danh mục công việc')

@section('content')
    <main class="container">
        <h1 class="page-title">Sửa danh mục công việc</h1>
        <form class="panel" method="POST" action="{{ route('task-categories.update', $taskCategory) }}">
            @method('PUT')
            @include('task-categories.form')
        </form>
    </main>
@endsection
