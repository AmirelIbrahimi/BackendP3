<!DOCTYPE html>
<html lang="nl">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mijn Laravel Applicatie')</title>

    <!-- Hier link je naar je CSS bestand -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <!-- Navigatie of header content hier -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer content hier -->
</footer>
</body>
</html>
