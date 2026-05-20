@extends('layouts.app')

@section('title', 'Thêm dự án')

@section('content')
    <main class="container">
        <h1 class="page-title">Thêm dự án</h1>
        <form class="panel" method="POST" action="{{ route('projects.store') }}">
            @include('projects.form')
        </form>
    </main>
@endsection
