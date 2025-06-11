<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    // Lưu đơn hàng
    public function store(Request $request)
    {
        // Kiểm tra hợp lệ
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_email'   => 'nullable|email',
            'customer_phone'   => 'required|string|max:20',
            'customer_address' => 'required|string|max:255',
            'payment_method'   => 'required|in:cod,bank,paypal',
        ]);

        // Lấy giỏ hàng từ session
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->withErrors(['Giỏ hàng trống!']);
        }

        // Tính tổng tiền
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Tạo đơn hàng mới
        $order = Order::create([
            'customer_name'    => $request->customer_name,
            'customer_email'   => $request->customer_email,
            'customer_phone'   => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'payment_method'   => $request->payment_method,
            'total_amount'     => $total,
            'status'           => 'pending', // hoặc 'đang xử lý'
        ]);

        // Xoá giỏ hàng
        Session::forget('cart');

        // Điều hướng đến trang thành công
        return redirect()->route('order.success')->with('success', 'Đặt hàng thành công!');
    }

    // Hiển thị trang thành công
    public function success()
    {
        return view('order_success');
    }
}
