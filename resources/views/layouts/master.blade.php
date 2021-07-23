<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
            <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('scripts')

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="topbar d-flex justify-content-center">
                <a href="/" class="btn btn-primary">Listado de Productos</a>
                <a href="/producto/create" class="btn btn-primary ml-2">+ Crear Producto</a>
            </div>
            <div class="container">
                @yield('content')
            </div>
        </div>
    </body>
</html>
