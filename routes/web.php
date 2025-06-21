<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/master', function () {
    return view('layout.master');
});

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');      // عرض جميع الـ subcategories


Route::get('subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');      // عرض جميع الـ subcategories
Route::get('subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');  // عرض نموذج إضافة Subcategory
Route::post('subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');        // حفظ Subcategory جديدة
Route::get('subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');  // عرض نموذج تعديل Subcategory
Route::put('subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategories.update');   // تحديث Subcategory
Route::delete('subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');  // حذف Subcategory
Route::resource('products', ProductController::class);