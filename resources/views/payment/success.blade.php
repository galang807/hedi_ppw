@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Invoice Pembayaran</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>ID Pembayaran:</strong> {{ $payment->payment_id }} <br>
            <strong>Status:</strong> {{ ucfirst($payment->status) }} <br>
            <strong>Waktu Pembayaran:</strong> {{ \Carbon\Carbon::parse($payment->paid_at)->format('d M Y, H:i') }}
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                // Ambil semua cart yang berkaitan dengan payment (satu-to-satu sementara)
                $cart = \App\Models\Cart::find($payment->cart_id);
                $product = $cart?->product;
                $quantity = $cart?->quantity ?? 0;
                $subtotal = $quantity * ($product?->price ?? 0);
                @endphp

                @if ($product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $quantity }}</td>
                    <td>Rp{{ number_format($product->price) }}</td>
                    <td>Rp{{ number_format($subtotal) }}</td>
                </tr>
                @else
                <tr>
                    <td colspan="4" class="text-center text-danger">Data produk tidak ditemukan.</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th>Rp{{ number_format($payment->amount) }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="text-end">
            <a href="{{ route('cart.reset') }}" class="btn btn-outline-success">Kembali Belanja</a>
        </div>
    </div>
</div>
@endsection