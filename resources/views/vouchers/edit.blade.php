@extends('layout.master')

@section('content')

<h3>Sửa Voucher</h3>

<form method="POST" action="{{ route('vouchers.update',$voucher) }}">
    @csrf
    @method('PUT')

    @include('vouchers.form')

    <button class="btn btn-primary">Cập nhật</button>

</form>

@endsection