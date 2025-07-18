<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online Hedi Yuniardi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0ffdb;
        }

        .navbar-custom {
            background-color: #2a602d;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}">Toko Online Hedi Yuniardi</a>
            <!-- <a class="btn btn-outline-light" href="{{ route('cart.index') }}">Keranjang</a> -->
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-white text-center py-3" style="background-color: #2a602d;">
        &copy; {{ date('Y') }} Toko Online Hedi Yuniardi.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>