<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #0d6efd;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #0b5ed7;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3 text-white">
        <h4 class="text-white">Fadhlur Admin</h4>
        <hr>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item mb-1">
                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item mb-1">
                <a class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">Layanan</a>
            </li>
            <li class="nav-item mb-1">
                <a class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">Pesanan</a>
            </li>

            {{-- Tambahkan menu lain di sini --}}
            <li class="nav-item mt-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-light w-100">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="mb-4">@yield('title')</h1>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
