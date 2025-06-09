{{-- resources/views/order_success.blade.php --}}
@extends('layouts.app') {{-- Nếu bạn dùng layout chung, thay bằng layout bạn có. Nếu không dùng thì xóa dòng này --}}

@section('title', 'Hoàn thành đơn hàng - Teddy Paradise')

@section('content')

    <div class="grid">
        <div class="cart_header">
            <a href="{{ url('/cart') }}" class="cart_header-cart">GIỎ HÀNG</a>
            <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
            <a href="{{ url('/payment') }}" class="cart_header-payment">CHI TIẾT THANH TOÁN</a>
            <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
            <a href="{{ url('/order-success') }}" class="cart_header-success">HOÀN THÀNH ĐƠN HÀNG</a>
            <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
        </div>

        <div class="grid" style="text-align: center; padding: 50px;">
            <h1>Cảm ơn bạn đã đặt hàng!</h1>
            <p>Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</p>
            <a href="{{ url('/') }}">Quay về trang chủ</a>
        </div>
@endsection