@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
<div class="modal js_modal" style="display: flex; position: relative;">
    <div class="modal_body" style="margin: auto; max-width: 500px;">
        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="auth_form js_register-form" style="display: block;">
            @csrf
            <div class="auth_form-header">
                <h3 class="auth_form-heading">ĐĂNG KÝ</h3>
                <a href="{{ route('login') }}" class="auth_form-switch">ĐĂNG NHẬP</a>
            </div>

            <div class="auth_form-form">
                <div class="auth_form-group">
                    <input type="text" name="name" class="auth_form-input" placeholder="Tên đăng nhập" value="{{ old('name') }}" required>
                    @error('name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth_form-group">
                    <input type="email" name="email" class="auth_form-input" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth_form-group">
                    <input type="password" name="password" class="auth_form-input" placeholder="Mật khẩu" required>
                    @error('password')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="auth_form-group">
                    <input type="password" name="password_confirmation" class="auth_form-input" placeholder="Nhập lại mật khẩu" required>
                </div>
            </div>

            <div class="auth_form-aside">
                <p class="auth_form-policy">
                    Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này,
                    quản lý quyền truy cập vào tài khoản của bạn, và cho các mục đích khác được mô tả trong chính sách riêng tư của chúng tôi.
                </p>
            </div>

            <div class="auth_form-controls">
                <a href="{{ url()->previous() }}" class="btn btn_back">TRỞ LẠI</a>
                <button type="submit" class="btn btn_register btn_login-register">ĐĂNG KÝ</button>
            </div>
        </form>
    </div>
</div>
@endsection
