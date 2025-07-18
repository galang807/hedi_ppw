<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    public function process(Request $request)
    {
        $cartItems = Cart::with('product')->get();
        $amount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $cartId = optional($cartItems->first())->id;
        $payment = Payment::create([
            'payment_id' => Str::uuid()->toString(),
            'cart_id' => $cartId,
            'amount' => $amount,
            'payment_method' => 'transfer',
            'status' => 'success',
            'paid_at' => now(),
            'created_at' => now(),
        ]);

        return view('payment.success', compact('payment', 'cartId'));
    }
}
