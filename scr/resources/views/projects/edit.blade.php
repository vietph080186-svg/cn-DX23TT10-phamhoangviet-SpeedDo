@extends('layouts.app')

@section('title', 'Sửa dự án')

@section('content')
    <main class="container">
        <h1 class="page-title">Sửa dự án</h1>
        <form class="panel" method="POST" action="{{ route('projects.update', $project) }}">
            @method('PUT')
            @include('projects.form')
        </form>
    </main>
@endsection
