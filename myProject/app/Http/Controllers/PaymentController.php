<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Hiển thị form thanh toán với dữ liệu giỏ hàng giả lập
    public function showPaymentForm()
    {
        // Ví dụ dữ liệu giỏ hàng mẫu
        $cart_data = [
            ['name' => 'Gấu bông Teddy', 'price' => 150000, 'quantity' => 2],
            ['name' => 'Gấu bông Panda', 'price' => 200000, 'quantity' => 1],
        ];

        // Tính tổng tiền
        $total_price = 0;
        foreach ($cart_data as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }

        // Trả về view 'payment' với dữ liệu
        return view('payment', [
            'cart_data' => $cart_data,
            'total_price' => $total_price,
        ]);
    }
}
