document.addEventListener('DOMContentLoaded', () => {
    const showAlert = (message, isError = false) => {
        alert(isError ? `Lỗi: ${message}` : message);
    };

    // Xử lý thêm vào giỏ hàng
    document.querySelectorAll('.product_list-addtocart').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            event.preventDefault();
            const productId = btn.dataset.id;
            const quantity = 1; // Hoặc lấy từ input nếu có

            try {
                const response = await fetch('/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ id: productId, quantity })
                });
                const data = await response.json();
                if (data.success) {
                    showAlert('Thêm sản phẩm thành công');
                    location.reload();
                } else {
                    showAlert(data.message || 'Thêm sản phẩm thất bại', true);
                }
            } catch (error) {
                console.error('Lỗi khi thêm sản phẩm:', error);
                showAlert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ', true);
            }
        });
    });

    // Xử lý tăng số lượng
    document.querySelectorAll('.quantity-increase').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            event.preventDefault();
            const productId = btn.dataset.id;

            try {
                const response = await fetch(`/cart/increase/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                const data = await response.json();
                if (data.success) {
                    location.reload();
                } else {
                    showAlert(data.message || 'Cập nhật thất bại', true);
                }
            } catch (error) {
                console.error('Lỗi khi cập nhật số lượng:', error);
                showAlert('Có lỗi xảy ra khi cập nhật giỏ hàng', true);
            }
        });
    });

    // Xử lý giảm số lượng
    document.querySelectorAll('.quantity-decrease').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            event.preventDefault();
            const productId = btn.dataset.id;

            try {
                const response = await fetch(`/cart/decrease/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                const data = await response.json();
                if (data.success) {
                    location.reload();
                } else {
                    showAlert(data.message || 'Cập nhật thất bại', true);
                }
            } catch (error) {
                console.error('Lỗi khi cập nhật số lượng:', error);
                showAlert('Có lỗi xảy ra khi cập nhật giỏ hàng', true);
            }
        });
    });

    // Xử lý xóa sản phẩm
    document.querySelectorAll('.cart_item-remove').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            event.preventDefault();
            const productId = btn.dataset.id;

            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                try {
                    const response = await fetch(`/cart/remove/${productId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                    const data = await response.json();
                    if (data.success) {
                        showAlert('Xóa sản phẩm thành công');
                        location.reload();
                    } else {
                        showAlert(data.message || 'Xóa sản phẩm thất bại', true);
                    }
                } catch (error) {
                    console.error('Lỗi khi xóa sản phẩm:', error);
                    showAlert('Có lỗi xảy ra khi xóa sản phẩm', true);
                }
            }
        });
    });
});
