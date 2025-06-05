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

        <div class="container text-center py-5">
            <h1 class="text-success">🎉 Đặt hàng thành công!</h1>
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">Quay về trang chủ</a>
        </div>
@endsection