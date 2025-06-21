<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    // تعريف العلاقة مع الـ Category
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
