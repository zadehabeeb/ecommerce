<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    // تحديد الأعمدة التي يمكن تعبئتها تلقائيًا
    protected $fillable = ['name'];  // إضافة _token هنا
    public function subcategories()
    {
        return $this->hasMany(Subcategories::class);
    }
}
