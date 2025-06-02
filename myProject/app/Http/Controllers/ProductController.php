<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::latest()->get();
        return view('products', compact('products'));  // view products.blade.php
    }

    // Hiển thị chi tiết 1 sản phẩm
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.product_details', compact('product'));
    }

    // Hiển thị form sửa sản phẩm (cần đăng nhập)
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Xử lý cập nhật sản phẩm (cần đăng nhập)
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
            'image_url' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Đã cập nhật sản phẩm!');
    }

    // Xoá sản phẩm (cần đăng nhập)
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Đã xoá sản phẩm!');
    }
}
