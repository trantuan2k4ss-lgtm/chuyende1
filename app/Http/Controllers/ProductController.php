<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $data = $request->except('images');

        // 🔥 thêm dòng này
        $data['slug'] = Str::slug($request->name) . '-' . time();

        // ảnh chính
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);

        // ảnh phụ
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                \App\Models\ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $img->store('products', 'public')
                ]);
            }
        }

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $data['slug'] = Str::slug($request->name) . '-' . time();
        $product->update($data);

        // thêm ảnh mới
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $file->store('products', 'public')
                ]);
            }
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa thành công');
    }
}
