@extends('layouts.app')

@section('title', 'Thêm phòng ban')

@section('content')
    <main class="container">
        <h1 class="page-title">Thêm phòng ban</h1>
        <form class="panel" method="POST" action="{{ route('admin.departments.store') }}">
            @include('admin.departments.form')
        </form>
    </main>
@endsection
