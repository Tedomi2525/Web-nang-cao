<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate form
        $validated = $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_email'   => 'nullable|email|max:255',
            'customer_phone'   => 'nullable|string|max:20',
            'customer_address' => 'nullable|string',
            'payment_method'   => 'required|string|in:cod,bank,paypal',
        ]);

        // Lấy cart từ session
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống.');
        }

        // Tính tổng tiền
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Tạo order
        $order = new Order();
        $order->customer_name    = $validated['customer_name'];
        $order->customer_email   = $validated['customer_email'] ?? null;
        $order->customer_phone   = $validated['customer_phone'] ?? null;
        $order->customer_address = $validated['customer_address'] ?? null;
        $order->payment_method   = $validated['payment_method'];
        $order->total_amount     = $totalAmount;
        $order->status           = 'pending';
        $order->save();

        // Xoá giỏ hàng
        Session::forget('cart');

        // Redirect tới trang hoàn thành
        return redirect()->route('order.success')->with('success', 'Đặt hàng thành công!');
    }

    public function success()
    {
        return view('order_success');
    }
}
