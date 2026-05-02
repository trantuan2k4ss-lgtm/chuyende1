@extends('layout.master')
@section('title', 'Danh sách Voucher')

@section('content')

<h3>Voucher</h3>

<a href="{{ route('vouchers.create') }}" class="btn btn-primary mb-3">+ Thêm</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Code</th>
            <th>Tên</th>
            <th>Giảm</th>
            <th>Số lượng</th>
            <th>Hạn</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($vouchers as $v)
        <tr>
            <td>{{ $v->code }}</td>
            <td>{{ $v->name }}</td>

            <td>
                @if($v->type == 'percent')
                {{ $v->value }}%
                @else
                {{ number_format($v->value) }}đ
                @endif
            </td>

            <td>{{ $v->quantity }}</td>
            <td>{{ $v->end_date }}</td>

            <td>
                <a href="{{ route('vouchers.edit',$v) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form action="{{ route('vouchers.destroy',$v) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $vouchers->links() }}

@endsection