@extends('front-end.master')
@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-md-3">
                <div style="height: 100px">
                    <img src="{{ asset('storage/' . $product->img) }}" width="100" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{$product->content}}</p>
                        <a href="{{ route('cart.addToCart', $product->id) }}" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
