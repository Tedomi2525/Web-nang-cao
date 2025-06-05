<div class="modal js_modal">
    <div class="modal_overlay js_overlay"></div>
    <div class="modal_body">

        {{-- LOGIN FORM --}}
        <div class="auth_form js_login-form">
            <div class="auth_form-header">
                <h3 class="auth_form-heading">ĐĂNG NHẬP</h3>
                <span class="auth_form-switch js_switch">ĐĂNG KÝ</span>
            </div>

            <form method="POST" action="{{ route('login') }}" class="auth_form-form">
                @csrf
                <div class="auth_form-group">
                    <input type="text" name="email" class="auth_form-input" placeholder="Email" required>
                </div>
                <div class="auth_form-group">
                    <input type="password" name="password" class="auth_form-input" placeholder="Mật khẩu" required>
                </div>

                <div class="auth_form-remember">
                    <label>
                        <input type="checkbox" name="remember" class="auth_form-check">
                        <span class="auth_form-remember-text">Ghi nhớ mật khẩu</span>
                    </label>
                </div>

                <div class="auth_form-controls">
                    <button type="button" class="btn btn_back js_modal-close">TRỞ LẠI</button>
                    <button type="submit" class="btn btn_login btn_login-register">ĐĂNG NHẬP</button>
                </div>

                <div class="auth_form-forget">
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                </div>
            </form>
        </div>

        {{-- REGISTER FORM --}}
        <div class="auth_form js_register-form" style="display: none;">
            <div class="auth_form-header">
                <h3 class="auth_form-heading">ĐĂNG KÝ</h3>
                <span class="auth_form-switch js_switch">ĐĂNG NHẬP</span>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth_form-form">
                @csrf
                <div class="auth_form-group">
                    <input type="text" name="name" class="auth_form-input" placeholder="Tên đăng nhập" required>
                </div>
                <div class="auth_form-group">
                    <input type="email" name="email" class="auth_form-input" placeholder="Email" required>
                </div>
                <div class="auth_form-group">
                    <input type="password" name="password" class="auth_form-input" placeholder="Mật khẩu" required>
                </div>
                <div class="auth_form-group">
                    <input type="password" name="password_confirmation" class="auth_form-input" placeholder="Nhập lại mật khẩu" required>
                </div>

                <div class="auth_form-aside">
                    <p class="auth_form-policy">
                        Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này,
                        quản lý quyền truy cập vào tài khoản của bạn, và cho các mục đích khác được mô tả trong chính sách riêng tư của chúng tôi.
                    </p>
                </div>

                <div class="auth_form-controls">
                    <button type="button" class="btn btn_back js_modal-close">TRỞ LẠI</button>
                    <button type="submit" class="btn btn_register btn_login-register">ĐĂNG KÝ</button>
                </div>
            </form>
        </div>

    </div>
</div>
