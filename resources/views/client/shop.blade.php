@extends('client.layout')

@section('content')

<h2 class="mb-4">Sản phẩm</h2>

<div class="row">

    @foreach($products as $p)
    <div class="col-md-3 mb-4">
        <div class="card h-100">

            <img src="{{ asset('storage/'.$p->image) }}" class="card-img-top">

            <div class="card-body">
                <h6>{{ $p->name }}</h6>

                {{-- giá --}}
                @if($p->sale_price)
                <p>
                    <del>{{ number_format($p->price) }}đ</del>
                    <b class="text-danger">
                        {{ number_format($p->sale_price) }}đ
                    </b>
                </p>
                @else
                <p>{{ number_format($p->price) }}đ</p>
                @endif

                <a href="#" class="btn btn-dark w-100">Xem</a>
            </div>

        </div>
    </div>
    @endforeach

</div>

{{-- phân trang --}}
<div class="mt-4">
    {{ $products->links() }}
</div>

@endsection