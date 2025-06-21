<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Subcategories;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // عرض جميع المنتجات
    public function index()
    {
        $products = Products::with('subcategory')->get();  // جلب المنتجات مع الفئات الفرعية المرتبطة
        return view('products.index', compact('products'));
    }

    // عرض نموذج إضافة منتج جديد
    public function create()
    {
        $subcategories = Subcategories::all();  // جلب جميع الفئات الفرعية
        return view('products.create', compact('subcategories'));
    }

    // حفظ منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'subcategory_id' => 'required|exists:subcategories,id',  // التحقق من وجود الفئة الفرعية
        ]);

        Products::create($request->all());  // حفظ المنتج

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // عرض نموذج تعديل منتج
    public function edit(Products $product)
    {
        $subcategories = Subcategories::all();  // جلب الفئات الفرعية
        return view('products.edit', compact('product', 'subcategories'));
    }

    // تحديث المنتج
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'subcategory_id' => 'required|exists:subcategories,id',  // التحقق من وجود الفئة الفرعية
        ]);

        $product->update($request->all());  // تحديث المنتج

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // حذف منتج
    public function destroy(Products $product)
    {
        $product->delete();  // حذف المنتج

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
