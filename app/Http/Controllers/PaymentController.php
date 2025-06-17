<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Hiển thị trang thanh toán
    public function showPaymentForm()
    {
        // Lấy dữ liệu giỏ hàng từ session
        $cart_data = session('cart', []);

        // Tính tổng tiền
        $total_price = 0;
        foreach ($cart_data as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }

        return view('payment', compact('cart_data', 'total_price'));
    }

    // Xử lý submit thanh toán
    public function submitPayment(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
            'payment_method' => 'required|in:cod,bank,paypal',
        ]);

        $cart_data = session('cart', []);

        if (empty($cart_data)) {
            return response()->json([
                'success' => false,
                'message' => 'Giỏ hàng trống, không thể thanh toán.'
            ], 400);
        }

        // Ở đây bạn có thể xử lý logic lưu đơn hàng vào database (nếu cần)
        // Hoặc xử lý thanh toán với các cổng thanh toán

        // Giả lập thành công:
        // Xóa giỏ hàng sau khi thanh toán thành công
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'message' => 'Đơn hàng của bạn đã được xử lý thành công.'
        ]);
    }
}
