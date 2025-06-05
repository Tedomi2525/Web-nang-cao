<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Teddy Paradise')</title>

    {{-- Thêm meta CSRF token để JS dễ lấy --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.6.0/css/all.min.css') }}" />

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="app">
        <div class="grid">
            <header class="header">
                <div class="header_intro">
                    <ul class="header_intro-list">
                        <li class="header_intro-item" style="font-weight: bold;">Sáng tạo không giới hạn</li>
                    </ul>

                    <ul class="header_intro-list">
                        <li class="header_intro-item header_intro-item-separate tooltip">
                            <i class="header_intro-icon fa-regular fa-clock"></i>
                            08:00 - 17:00
                            <div class="subintro">Giờ làm việc</div>
                        </li>
                        <li class="header_intro-item tooltip">
                            <i class="header_intro-icon fa-solid fa-phone"></i>
                            +84 904091648
                            <div class="subintro">SĐT liên hệ</div>
                        </li>
                    </ul>
                </div>

                <nav class="header_navbar">
                    <a href="{{ url('/') }}" class="header_navbar-logo">
                        <img src="{{ asset('assets/img/Gemini_Generated_Image_krh9ixkrh9ixkrh9.jpg') }}"
                            alt="Teddy Paradise" title="Teddy Paradise - teddyparadise.com"
                            class="header_navbar-logo" />
                    </a>

                    <ul class="header_navbar-list">
                        <li class="header_navbar-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="header_navbar-item"><a href="{{ url('/introduce') }}">Giới thiệu</a></li>
                        <li class="header_navbar-item"><a href="{{ url('/products') }}">Sản phẩm</a></li>
                        <li class="header_navbar-item"><a href="{{ url('/contact') }}">Liên hệ</a></li>
                    </ul>

                    <div class="header_navbar-btn">
                        {{-- Nút tìm kiếm --}}
                        <div class="header_navbar-btn-item search-btn">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>

                        <div class="header_navbar-search">
                            <input type="text" placeholder="Tìm kiếm..." />
                        </div>

                        <div class="separator"></div>

                        {{-- Nếu chưa đăng nhập --}}
                        @guest
                            <div class="header_navbar-btn-item">
                                <a href="{{ route('login') }}">
                                    <button>Đăng nhập</button>
                                </a>
                            </div>
                            <div class="separator"></div>
                        @endguest

                        {{-- Nếu đã đăng nhập --}}
                        @auth
                            <div class="header_navbar-btn-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Đăng xuất</button>
                                </form>
                            </div>
                            <div class="separator"></div>
                        @endauth

                        {{-- Giỏ hàng --}}
                        <div class="header_navbar-btn-item cart_shopping">
                            <a href="{{ url('/cart') }}">
                                Giỏ hàng
                                <i style="color: white;" class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </header>
        </div>

        {{-- Main content --}}
        <main class="grid">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/order.js') }}"></script>

    {{-- Chỉ load payment.js khi đang ở trang payment --}}
    @if(request()->is('payment'))
        <script src="{{ asset('assets/js/payment.js') }}"></script>
    @endif
</body>

</html>