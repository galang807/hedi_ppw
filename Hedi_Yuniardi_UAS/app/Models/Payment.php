<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id';
    public $incrementing = false;

    protected $fillable = ['payment_id', 'cart_id', 'amount', 'payment_method', 'status', 'paid_at'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
