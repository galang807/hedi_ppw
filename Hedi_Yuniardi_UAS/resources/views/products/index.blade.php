@extends('layouts.app')

@section('content')
<h2 class="mb-4">Daftar Produk</h2>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4">
        <div class="card mb-4">
            <img
                src="{{ asset('storage/' . $product->name . '.jpeg') }}"
                alt="{{ $product->name }}"
                class="card-img-top"
                style="max-height: 250px; width: 100%; object-fit: contain;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category }}</h6>
                <p class="card-text">{{ $product->description }}</p>
                <p class="fw-bold">Rp{{ number_format($product->price) }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection