<?php

namespace App\Http\Controllers;

use App\Models\Categories;  // تأكد من استيراد الـ Model الصحيح
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index()
    {
        $categories = Categories::all();  // استخدام الـ Model الصحيح
        return view('categories.index', compact('categories'));  // عرضها في الـ View
    }

    // عرض نموذج إضافة فئة جديدة
    public function create()
    {
        return view('categories.create');  // عرض نموذج إضافة فئة
    }

    // حفظ فئة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',  // التحقق من صحة الاسم
            
        ]);

        Categories::create($request->all());  // استخدام الـ Model الصحيح لحفظ الفئة

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // عرض نموذج تعديل فئة
    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));  // عرض نموذج تعديل الفئة
    }

    // تحديث الفئة
    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',  // التحقق من صحة الاسم
            
        ]);

        $category->update($request->all());  // تحديث الفئة باستخدام الـ Model الصحيح

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // حذف فئة
    public function destroy(Categories $category)
    {
        $category->delete();  // حذف الفئة باستخدام الـ Model الصحيح

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
