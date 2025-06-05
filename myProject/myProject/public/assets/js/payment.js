document.addEventListener("DOMContentLoaded", () => {
    const cartSummary = document.getElementById("cart-summary");
    const totalPrice = document.getElementById("total-price");
    const paymentForm = document.getElementById("payment-form");

    // Lấy dữ liệu giỏ hàng từ biến toàn cục do Blade nhúng vào
    const cart = window.cartData || [];

    // Hiển thị giỏ hàng
    let total = 0;
    if (cart.length === 0) {
        cartSummary.innerHTML = "<li>🛒 Giỏ hàng của bạn đang trống.</li>";
    } else {
        cartSummary.innerHTML = "";
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            const li = document.createElement("li");
            li.textContent = `${item.name} x${item.quantity} - ${itemTotal.toLocaleString("vi-VN")} VND`;
            cartSummary.appendChild(li);
        });
    }
    totalPrice.textContent = total.toLocaleString("vi-VN");

    // Xử lý gửi đơn hàng
    if (paymentForm) {
        paymentForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const name = document.getElementById("name")?.value.trim();
            const phone = document.getElementById("phone")?.value.trim();
            const address = document.getElementById("address")?.value.trim();
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked')?.value;
            const submitBtn = paymentForm.querySelector("button[type='submit']");

            // Kiểm tra dữ liệu đầu vào
            if (!name || !phone || !address || !paymentMethod) {
                alert("⚠️ Vui lòng điền đầy đủ thông tin trước khi thanh toán.");
                return;
            }

            const phoneRegex = /^0\d{9}$/;
            if (!phoneRegex.test(phone)) {
                alert("⚠️ Số điện thoại không hợp lệ. Vui lòng nhập lại số có 10 chữ số và bắt đầu bằng 0.");
                return;
            }

            // Disable nút gửi để tránh gửi nhiều lần
            submitBtn.disabled = true;
            const originalText = submitBtn.textContent;
            submitBtn.textContent = "⏳ Đang xử lý...";

            try {
                const response = await fetch("/payment/submit", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.content || "",
                    },
                    body: JSON.stringify({
                        name,
                        phone,
                        address,
                        payment_method: paymentMethod,
                        cart,
                    }),
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    alert(`✅ Thanh toán thành công! Tổng tiền: ${data.total_price.toLocaleString("vi-VN")} VND`);
                    window.location.href = "/order-success";
                } else {
                    alert(data.message || "❌ Thanh toán thất bại. Vui lòng thử lại.");
                }
            } catch (err) {
                console.error("Lỗi khi gửi thanh toán:", err);
                alert("⚠️ Có lỗi xảy ra. Vui lòng kiểm tra kết nối mạng và thử lại.");
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
    }
});
