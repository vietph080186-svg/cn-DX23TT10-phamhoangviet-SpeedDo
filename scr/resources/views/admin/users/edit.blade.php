@extends('layouts.app')

@section('title', 'Sửa người dùng')

@section('content')
    <main class="container">
        <h1 class="page-title">Sửa người dùng</h1>
        <form class="panel" method="POST" action="{{ route('admin.users.update', $user) }}">
            @method('PUT')
            @include('admin.users.form')
        </form>
    </main>
@endsection
