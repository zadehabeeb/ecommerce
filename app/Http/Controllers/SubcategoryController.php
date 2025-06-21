<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Subcategories;  // استخدام الـ Model الصحيح بصيغة الجمع
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    // عرض جميع الـ subcategories
    public function index()
    {
        $subcategories = Subcategories::with('category')->get();  // جلب الـ subcategories مع الفئات المرتبطة
        return view('subcategories.index', compact('subcategories'));
    }

    // عرض نموذج إضافة Subcategory
    public function create()
    {
        $categories = Categories::all();  // جلب كل الفئات الرئيسية
        return view('subcategories.create', compact('categories'));
    }

    // حفظ Subcategory جديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',  // التحقق من وجود الفئة
        ]);

        Subcategories::create($request->all());  // حفظ الـ Subcategory

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    // عرض نموذج تعديل Subcategory
    public function edit(Subcategories $subcategory)
    {
        $categories = Categories::all();  // جلب الفئات الرئيسية
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    // تحديث Subcategory
    public function update(Request $request, Subcategories $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',  // التحقق من وجود الفئة
        ]);

        $subcategory->update($request->all());  // تحديث الـ Subcategory

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    // حذف Subcategory
    public function destroy(Subcategories $subcategory)
    {
        $subcategory->delete();  // حذف الـ Subcategory

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
