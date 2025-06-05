<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán');
        }

        $userId = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng
        CartItem::where('user_id', $userId)->delete();

        return redirect()->route('order.success');
    }

    public function success()
    {
        return view('order_success'); // Đảm bảo file blade tên đúng: order_succes.blade.php
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                       ->with('items.product')
                       ->get();

        return view('orders.index', compact('orders'));
    }
}
