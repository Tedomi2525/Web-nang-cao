document.addEventListener('DOMContentLoaded', () => {
    const showAlert = (message, isError = false) => {
        alert(isError ? `Lỗi: ${message}` : message);
    };

    const updateDOMQuantity = (btn, newQuantity) => {
        const quantitySpan = btn.closest('.cart_item-details').querySelector('.cart_item-quantity-value');
        if (quantitySpan) {
            quantitySpan.textContent = newQuantity;
        }
    };

    const updateDOMTotal = (newTotal) => {
        const totalDisplay = document.querySelector('.cart_total span');
        if (totalDisplay) {
            totalDisplay.textContent = newTotal.toLocaleString('vi-VN') + '₫';
        }
    };

    // Thêm vào giỏ hàng
    document.querySelectorAll('.product_list-addtocart').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            event.preventDefault();
            const productId = btn.dataset.id;
            const quantity = 1;

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

    // Tăng số lượng
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
                    updateDOMQuantity(btn, data.new_quantity);
                    updateDOMTotal(data.new_total);
                } else {
                    showAlert(data.message || 'Cập nhật thất bại', true);
                }
            } catch (error) {
                console.error('Lỗi khi cập nhật số lượng:', error);
                showAlert('Có lỗi xảy ra khi cập nhật giỏ hàng', true);
            }
        });
    });

    // Giảm số lượng
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
                    if (data.new_quantity > 0) {
                        updateDOMQuantity(btn, data.new_quantity);
                        updateDOMTotal(data.new_total);
                    } else {
                        btn.closest('.cart_item').remove();
                        updateDOMTotal(data.new_total);
                    }
                } else {
                    showAlert(data.message || 'Cập nhật thất bại', true);
                }
            } catch (error) {
                console.error('Lỗi khi cập nhật số lượng:', error);
                showAlert('Có lỗi xảy ra khi cập nhật giỏ hàng', true);
            }
        });
    });

    // Xóa sản phẩm
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
                        btn.closest('.cart_item').remove();
                        updateDOMTotal(data.new_total);
                        showAlert('Xóa sản phẩm thành công');
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
