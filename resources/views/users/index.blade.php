@extends('layout.master')
@section('title','Quản lý người dùng')
@section('content')

<h3>Quản lý người dùng</h3>

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Thêm user</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->phone }}</td>

            <td>
                @if($u->role == 'admin')
                <span class="badge bg-danger">Admin</span>
                @else
                <span class="badge bg-secondary">Customer</span>
                @endif
            </td>

            <td>
                <a href="{{ route('users.edit',$u) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form action="{{ route('users.destroy',$u) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

@endsection