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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        <!-- Mostrar mensajes de error generales -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                    <th>Acciones</th>
                </tr>
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->razon_social }}</td>
                        <td>{{ $empresa->nombre_fantasia }}</td>
                        <td>{{ $empresa->cuit }}</td>
                        <td>{{ $empresa->estado }}</td>
                        <td>
                            <a href="{{ route('empresas.show', $empresa->id) }}">Ver</a> |
                            <a href="{{ route('empresas.edit', $empresa->id) }}">Editar</a> |
                            <form action="{{ route('empresas.delete', $empresa->id) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Seguro desea eliminar la empresa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </div>
    </div>
</body>

</html>
