<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add($id)
    {
        $item = Cart::where('product_id', $id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            Cart::create([
                'product_id' => $id,
                'quantity' => 1,
                'added_at' => now()
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function reset()
    {
        // Hapus semua cart dari database
        Cart::query()->delete();

        // Jika menggunakan session, hapus juga
        session()->forget('cart');
        session()->forget('cart_id');

        // Redirect ke halaman produk
        return redirect()->route('products.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
