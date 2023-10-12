<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categoriesProduct()
    {
        return $this->belongsTo(ProductCategories::class,'product_categories');
    }
}
