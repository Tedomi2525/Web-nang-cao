@extends('layouts.app')

@section('title', 'Giỏ hàng - Teddy Paradise')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="grid">
    <div class="cart_header">
        <a href="{{ url('/cart') }}" class="cart_header-cart">GIỎ HÀNG</a>
        <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
        <a href="{{ url('/payment') }}" class="cart_header-payment">CHI TIẾT THANH TOÁN</a>
        <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
        <a href="{{ url('/order_success') }}" class="cart_header-success">HOÀN THÀNH ĐƠN HÀNG</a>
        <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
    </div>

    <div class="cart_container" id="cart-container">
        @if(count($cart_data) > 0)
            @foreach($cart_data as $id => $item)
                <div class="cart_item" data-id="{{ $id }}">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="cart_item-image">
                    <div class="cart_item-details">
                        <p class="cart_item-name">{{ $item['name'] }}</p>
                        <p class="cart_item-price">{{ number_format($item['price'], 0, ',', '.') }}₫</p>
                        <div class="cart_item-quantity">
                            <button class="quantity-decrease" data-id="{{ $id }}">  -  </button>
                            <span class="cart_item-quantity-value" id="quantity-{{ $id }}">{{ $item['quantity'] }}</span>
                            <button class="quantity-increase" data-id="{{ $id }}">+</button>
                        </div>
                        <button class="cart_item-remove" data-id="{{ $id }}">Xóa</button>
                    </div>
                </div>
            @endforeach

            <div class="cart_total">
                @php
                    $total = collect($cart_data)->sum(fn($item) => $item['price'] * $item['quantity']);
                @endphp
                <p>Tổng tiền: <span id="cart-total-price">{{ number_format($total, 0, ',', '.') }}₫</span></p>
                <a href="{{ url('/payment') }}" class="btn btn-primary">Tiến hành thanh toán</a>
            </div>
        @else
            <p class="cart_empty">Giỏ hàng trống. <a href="{{ url('/products') }}">Tiếp tục mua sắm</a></p>
        @endif
    </div>
</div>

<script src="{{ asset('js/cart.js') }}"></script>
@endsection
