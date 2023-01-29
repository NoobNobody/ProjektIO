<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'email',
        'telephone_number',
        'rental_time',
        'created_at'
    ];

    public function ordered_products()
    {
        return $this->hasMany(SaleProduct::class);
    }
}
