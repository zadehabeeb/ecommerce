<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    // تحديد الأعمدة التي يمكن تعبئتها تلقائيًا
    protected $fillable = ['name', 'description', 'price', 'stock', 'subcategory_id'];
    
    // علاقة المنتج مع الـ Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategories::class);
    }
}
