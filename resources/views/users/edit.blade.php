@extends('layout.master')

@section('content')

<h3>Sửa user</h3>

<form method="POST" action="{{ route('users.update',$user) }}">
    @csrf
    @method('PUT')

    @include('users.form')

    <button class="btn btn-primary">Cập nhật</button>

</form>

@endsection