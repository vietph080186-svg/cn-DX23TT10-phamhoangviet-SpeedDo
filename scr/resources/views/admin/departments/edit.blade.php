@extends('layouts.app')

@section('title', 'Sửa phòng ban')

@section('content')
    <main class="container">
        <h1 class="page-title">Sửa phòng ban</h1>
        <form class="panel" method="POST" action="{{ route('admin.departments.update', $department) }}">
            @method('PUT')
            @include('admin.departments.form')
        </form>
    </main>
@endsection
