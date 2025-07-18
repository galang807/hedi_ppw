@extends('layouts.app')

@section('content')
<h2 class="mb-4">Keranjang Belanja</h2>

@if($cartItems->isEmpty())
<p>Keranjang masih kosong.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($cartItems as $item)
        @php
        $subtotal = $item->product->price * $item->quantity;
        $total += $subtotal;
        @endphp
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp{{ number_format($item->product->price) }}</td>
            <td>Rp{{ number_format($subtotal) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h4>Total: Rp{{ number_format($total) }}</h4>
<form action="{{ route('payment.process') }}" method="POST">
    @csrf
    <button class="btn btn-success">Bayar Sekarang</button>
</form>
@endif
@endsection