@extends('layout.master')

@section('content')

<h3>Thêm user</h3>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    @include('users.form')

    <button class="btn btn-primary">Lưu</button>

</form>

@endsection