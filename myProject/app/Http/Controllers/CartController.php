<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('id');
        $quantity = (int) $request->input('quantity', 1);

        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        session(['cart' => $cart]);

        // Nếu request JSON (fetch API) thì trả về JSON
        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function increaseQuantity($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
            session(['cart' => $cart]);

            return response()->json([
                'success' => true,
                'new_quantity' => $cart[$id]['quantity']
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm']);
    }

    public function decreaseQuantity($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] -= 1;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session(['cart' => $cart]);

            return response()->json([
                'success' => true,
                'new_quantity' => $cart[$id]['quantity'] ?? 0
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm']);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm']);
    }
}
