<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'description', 'amount', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'products');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
