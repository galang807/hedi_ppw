<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category', 'price', 'stock', 'description'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
