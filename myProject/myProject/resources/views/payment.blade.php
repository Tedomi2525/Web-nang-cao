@extends('layouts.app')

@section('title', 'Thanh Toán - Teddy Paradise')

@section('content')
<div class="grid">
    <div class="cart_header">
        <a href="{{ url('/cart') }}" class="cart_header-cart">GIỎ HÀNG</a>
        <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
        <a href="{{ url('/payment') }}" class="cart_header-payment">CHI TIẾT THANH TOÁN</a>
        <i class="cart_header-arrow fa-solid fa-chevron-right"></i>
        <a href="{{ url('/order-success') }}" class="cart_header-success">HOÀN THÀNH ĐƠN HÀNG</a>
    </div>

    <div class="payment">
        <form id="payment-form" action="{{ route('order.store') }}" method="POST">
            @csrf

            <h3>Thông Tin Giao Hàng</h3>

            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" required />

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required />

            <label for="address">Địa chỉ giao hàng:</label>
            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" required />

            <label for="email">Email (nếu có):</label>
            <input type="text" id="email" name="email" placeholder="Nhập email" />

            <h3>Phương Thức Thanh Toán</h3>
            <label><input type="radio" name="payment_method" value="cod" checked /> Thanh toán khi nhận hàng (COD)</label><br />
            <label><input type="radio" name="payment_method" value="bank" /> Chuyển khoản ngân hàng</label><br />
            <label><input type="radio" name="payment_method" value="paypal" /> Thanh toán qua PayPal</label><br />

            <h3>Tóm Tắt Đơn Hàng</h3>
            <ul id="cart-summary">
                @forelse ($cart_data as $item)
                    <li>
                        <strong>{{ $item['name'] }}</strong> x{{ $item['quantity'] }} -
                        {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VND
                    </li>
                @empty
                    <li>Giỏ hàng trống</li>
                @endforelse
            </ul>

            <p><strong>Tổng tiền:</strong>
                <span id="total-price">{{ number_format($total_price, 0, ',', '.') }}</span> VND
            </p>

            <button type="submit" {{ count($cart_data) === 0 ? 'disabled' : '' }}>Thanh Toán</button>
        </form>

        <div id="payment-message" style="margin-top: 1em; color: green; display: none;"></div>
        <div id="payment-error" style="margin-top: 1em; color: red; display: none;"></div>
    </div>
</div>

<script>
    window.cartData = @json($cart_data);
</script>
@endsection
