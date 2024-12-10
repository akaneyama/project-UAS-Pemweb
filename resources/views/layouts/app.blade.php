<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .navbar {
            background-color: #1f1f1f;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .nav-link:hover, .dropdown-item:hover {
            color: #17a2b8 !important;
        }
        .dropdown-menu {
            background-color: #1f1f1f;
            border: 1px solid #333333;
        }
        .dropdown-item {
            color: #ffffff;
        }
        .dropdown-item:hover {
            background-color: #333333;
        }
        .navbar-toggler {
            border: none;
            color: white;
        }
        .navbar-toggler-icon {
            color: white;
        }
        .icon {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-book"></i> Perpustakaan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.index') }}">
                            <i class="fas fa-book icon"></i>Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pelanggan.index') }}">
                            <i class="fas fa-users icon"></i>Pelanggan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaksi.index') }}">
                            <i class="fas fa-shopping-cart icon"></i>Transaksi
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
