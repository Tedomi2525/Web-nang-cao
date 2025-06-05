// Lấy CSRF token từ thẻ meta
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const loginBtn = document.querySelector('.js_login');
const modal = document.querySelector('.js_modal');
const modalClose = document.querySelectorAll('.js_modal-close');
const modalOverlay = document.querySelector('.js_overlay');
const loginForm = document.querySelector('.js_login-form');
const registerForm = document.querySelector('.js_register-form');
const switchToRegisterButtons = document.querySelectorAll('.js_switch');
const loginButton = document.querySelector('.btn_login');
const registerButton = document.querySelector('.btn_register');
const logoutButton = document.querySelector('.js_logout');

// Hiển thị form đăng nhập
function showLoginForm() {
    modal.classList.add('open');
}

// Đóng modal
function closeModal() {
    modal.classList.remove('open');
}

// Xử lý đăng nhập
function handleLogin(event) {
    event.preventDefault();

    const email = loginForm.querySelector('input[name="email"]').value;
    const password = loginForm.querySelector('input[name="password"]').value;

    if (!email || !password) {
        alert("Vui lòng điền đầy đủ thông tin!");
        return;
    }

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ email, password })
    })
    .then(response => {
        if (response.ok) {
            return response.json().then(data => {
                setCookie('username', email, 1);
                location.reload();
            });
        } else {
            return response.json().then(data => {
                alert(data.message || 'Đăng nhập thất bại!');
            });
        }
    })
    .catch(error => {
        alert('Lỗi kết nối server, vui lòng thử lại sau!');
        console.error('Lỗi kết nối:', error.message);
    });
}

// Xử lý đăng ký
function handleRegister(event) {
    event.preventDefault();

    const name = registerForm.querySelector('input[name="name"]').value;
    const email = registerForm.querySelector('input[name="email"]').value;
    const password = registerForm.querySelector('input[name="password"]').value;
    const confirmPassword = registerForm.querySelector('input[name="password_confirmation"]').value;

    if (!name || !email || !password || !confirmPassword) {
        alert("Vui lòng nhập đầy đủ thông tin đăng ký!");
        return;
    }

    if (password !== confirmPassword) {
        alert("Mật khẩu xác nhận không khớp!");
        return;
    }

    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            name,
            email,
            password,
            password_confirmation: confirmPassword
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.message || "Đăng ký thất bại!");
            });
        }
        return response.json();
    })
    .then(data => {
        alert("Đăng ký thành công! Vui lòng đăng nhập.");
        registerForm.reset();
        registerForm.style.display = 'none';
        loginForm.style.display = 'block';
    })
    .catch(error => alert(error.message));
}

// Gán sự kiện
if (loginButton) loginButton.addEventListener('click', handleLogin);
if (registerButton) registerButton.addEventListener('click', handleRegister);
if (logoutButton) logoutButton.addEventListener('click', handleLogout);
if (loginBtn) loginBtn.addEventListener('click', showLoginForm);
if (modalOverlay) modalOverlay.addEventListener('click', closeModal);
modalClose.forEach(button => button.addEventListener('click', closeModal));

// Chuyển qua lại giữa form đăng nhập và đăng ký
switchToRegisterButtons.forEach(button => {
    button.addEventListener('click', () => {
        const loginFormStyle = window.getComputedStyle(loginForm);
        if (loginFormStyle.display !== 'none') {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        } else {
            registerForm.style.display = 'none';
            loginForm.style.display = 'block';
        }
    });
});

// Đặt cookie
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 864e5).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
}

// Lấy cookie
function getCookie(name) {
    return document.cookie.split('; ').find(row => row.startsWith(name))?.split('=')[1];
}

// Hiển thị lời chào người dùng
function displayUsername(username) {
    const loginBtnContainer = document.querySelector('.js_login button');
    const loginFormElement = document.querySelector('.js_login');

    if (loginBtnContainer && loginFormElement) {
        loginBtnContainer.textContent = `Xin chào, ${username}`;
        loginBtnContainer.style.fontSize = '10px';
        loginFormElement.style.pointerEvents = 'none';
    }
}

// Xử lý đăng xuất
function handleLogout() {
    setCookie('username', '', -1);
    location.reload();
}

// Khi trang load xong
document.addEventListener('DOMContentLoaded', function () {
    const username = getCookie('username');

    // Ẩn/hiện nút đăng xuất khi đã đăng nhập
    if (logoutButton) {
        if (username) {
            logoutButton.style.display = 'inline-block'; // hiển thị nếu đã login
            displayUsername(username); // hiển thị tên người dùng
        } else {
            logoutButton.style.display = 'none'; // ẩn nếu chưa login
        }
    }
});
