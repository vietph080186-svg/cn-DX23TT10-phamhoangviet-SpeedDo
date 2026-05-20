@extends('layouts.app')

@section('title', 'Thêm người dùng')

@section('content')
    <main class="container">
        <h1 class="page-title">Thêm người dùng</h1>
        <form class="panel" method="POST" action="{{ route('admin.users.store') }}">
            @include('admin.users.form')
        </form>
    </main>
@endsection
