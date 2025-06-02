@extends('layouts.app')

@section('title', 'Sản phẩm - Teddy Paradise')

@section('content')

    <div class="product_list">
        @foreach ($products as $product)
            <div class="product_list-item">
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                </a>
                <p class="product_list-title">{{ $product->name }}</p>
                <p class="product_list-price">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="product_btn product_btn-addtocart">THÊM VÀO GIỎ HÀNG</button>
                </form>

            </div>
        @endforeach
    </div>
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection