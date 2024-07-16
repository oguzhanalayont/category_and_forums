<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Forum Project')</title>
</head>
<body>
    <nav>
        <!-- Navigasyon menüsü -->
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer içeriği -->
    </footer>
</body>
</html>