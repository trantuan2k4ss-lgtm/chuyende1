@extends('layout.master')

@section('content')

<h3>Thêm Voucher</h3>

<form method="POST" action="{{ route('vouchers.store') }}">
    @csrf

    @include('vouchers.form')

    <button class="btn btn-primary">Lưu</button>

</form>

@endsection