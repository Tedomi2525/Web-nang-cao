document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('payment-form');
    const messageDiv = document.getElementById('payment-message');
    const errorDiv = document.getElementById('payment-error');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        messageDiv.style.display = 'none';
        errorDiv.style.display = 'none';

        const formData = new FormData(form);

        try {
            const response = await fetch('/payment/submit', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Lỗi không xác định');
            }

            const data = await response.json();

            if (data.success) {
                messageDiv.textContent = data.message || 'Thanh toán thành công!';
                messageDiv.style.display = 'block';

                // Clear cart UI or redirect user to page hoàn thành đơn hàng
                setTimeout(() => {
                    window.location.href = '/order-success';
                }, 1500);
            } else {
                throw new Error(data.message || 'Thanh toán thất bại');
            }
        } catch (error) {
            errorDiv.textContent = error.message;
            errorDiv.style.display = 'block';
        }
    });
});
