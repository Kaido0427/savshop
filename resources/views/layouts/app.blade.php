<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body> 
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #191E37;">
            <div class="container">
                <a class="navbar-brand text-center" href="{{ url('/') }}">
                    <img src="{{ asset('image/logo.png') }}" height="80" width="80" class="mr-2"
                        style="object-fit: contain;" alt="logo de SAVPLUS CONSEIL">
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
