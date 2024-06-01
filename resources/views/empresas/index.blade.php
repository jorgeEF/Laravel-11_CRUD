<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Empresas</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Listado de Empresas
                </div>

                <table>
                    <tr>
                        <th>Razon Social</th>
                        <th>Nombre</th>
                        <th>CUIT</th>
                        <th>Estado</th>
                    </tr>
                    @foreach($empresas as $empresa)
                    <tr>
                        <td>{{$empresa->razon_social}}</td>
                        <td>{{$empresa->nombre_fantasia}}</td>
                        <td>{{$empresa->cuit}}</td>
                        <td>{{$empresa->estado}}</td>
                    </tr>
                    @endforeach
            </div>
        </div>
    </body>
</html>
