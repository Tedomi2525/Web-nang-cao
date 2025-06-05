@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm - Teddy Paradise')

@section('content')
    <div class="grid">
        <div class="product_page">
            <div class="product_page-introduce">
                <div class="product_page-intro-item">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product_page-intro-img">
                </div>
                <div class="product_page-intro-item">
                    <div class="product_page-intro-subtitle">
                        <a href="{{ url('/') }}" class="product_subtitle-trangchu">TRANG CHỦ</a>
                        <p class="subdivider">/</p>
                        <a href="{{ route('products.index') }}" class="product_page-subtitle-sanpham">SẢN PHẨM</a>
                    </div>
                    <h2 class="product_page-intro-header">{{ $product->name }}</h2>

                    {{-- Nút Sửa và Xóa --}}
                    <div class="product_page-actions" style="margin-bottom: 15px;">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary"
                            style="margin-right: 10px;">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            style="display:inline-block;"
                            onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>

                    <div class="intro_line"></div>
                    <p class="product_intro-price">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                    <p class="product_page-intro-text">{{ $product->short_description }}</p>
                    <div class="product_intro-count">
                        <button class="product_intro-count-btn product_intro-count-minus js_minus">  -  </button>
                        <input type="number" class="product_intro-count-value js_count_value" value="1" min="1">
                        <button class="product_intro-count-btn product_intro-count-plus js_plus">+</button>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" class="js_count_value" value="1">
                            <button type="submit" class="product_btn product_btn-addtocart">THÊM VÀO GIỎ HÀNG</button>
                        </form>

                    </div>

                    {{-- CHIA SẺ --}}
                    <div class="product_intro-share">
                        <p class="product_intro-share-header">Chia sẻ cho bạn bè</p>
                        <div class="product_intro-share-link">
                            <a title="Chia sẻ qua Facebook" href="#" class="product_intro-share-icon" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                            <a title="Chia sẻ qua X" href="#" class="product_intro-share-icon" target="_blank"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a title="Chia sẻ qua WhatsApp" href="#" class="product_intro-share-icon" target="_blank"><i
                                    class="fa-brands fa-whatsapp"></i></a>
                            <a title="Chia sẻ qua LinkedIn" href="#" class="product_intro-share-icon" target="_blank"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product_page-favourite">
                <button class="product_btn">THÊM VÀO YÊU THÍCH</button>
            </div>

            <div class="product_page-description">
                <h3>Mô tả sản phẩm</h3>
                <div class="product_page-description-item">
                    <p>MÔ TẢ {{ strtoupper($product->name) }}:</p>
                    {!! $product->description !!}
                </div>

                <div class="product_page-description-item">
                    <p>CHÍNH SÁCH CHĂM SÓC KHÁCH HÀNG CỦA TEDDY PARADISE:</p>
                    <p>100% cam kết sản phẩm như hình.</p>
                    <p>Miễn phí hoàn toàn đổi trả trong vòng 3 ngày với trường hợp nhầm sản phẩm do lỗi của shop.</p>
                    <p>Lưu ý: chỉ chấp nhận đổi trả khi khách hàng quay video quá trình mở hàng chi tiết, không cắt ghép và
                        cần trọn vẹn cả gói hàng.</p>
                    <p>Nếu bạn cần thêm thông tin hoặc tư vấn về sản phẩm hãy chat với chúng tôi để có thể mang đến cho bạn
                        một sản phẩm ưng ý nhất nhé.</p>
                </div>

                <div class="product_page-description-item">
                    <p>HƯỚNG DẪN BẢO QUẢN VÀ SỬ DỤNG:</p>
                    <p>Tránh Nước: Không để gấu bông tiếp xúc với nước. Lau khô nếu bị ướt và để nơi thoáng mát.</p>
                    <p>Tránh Lửa: Không để gấu bông gần nguồn lửa hoặc nhiệt độ cao.</p>
                    <p>Lưu Trữ: Cất gấu bông ở nơi khô ráo, tránh ánh nắng trực tiếp.</p>
                    <p>Vệ Sinh: Dùng máy hút bụi hoặc khăn ẩm để lau bụi. Kiểm tra nhãn mác trước khi giặt.</p>
                </div>

                <div class="product_page-description-item">
                    <p>#TEDDY #TEDDYPARADISE #SHOP</p>
                </div>
            </div>
        </div>
    </div>
@endsection