@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center">
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

        <!-- Mostrar mensaje de éxito -->
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-auto p-3" id="toast-container">
                <div id="success-toast" class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('message') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="container d-flex justify-content-center gap-2">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('empresas.create') }}'">Nueva empresa</button>
            <button type="button" class="btn btn-success" onclick="location.href='{{ route('rubros.index') }}'">Rubros</button>
        </div>




        <h2>Listado de Empresas</h2>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Razon Social</th>
                    <th>Nombre</th>
                    <th>CUIT</th>
                    <th>Rubros</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->razon_social }}</td>
                        <td>{{ $empresa->nombre_fantasia }}</td>
                        <td>{{ $empresa->cuit }}</td>
                        <td>
                            @foreach($empresa->rubros as $rubro)
                                {{ $rubro->nombre }}
                            @endforeach
                        </td>
                        <td>{{ $empresa->estado }}</td>
                        <td>
                            <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline"
                                onsubmit="return confirm('¿Seguro desea eliminar la empresa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.getElementById('success-toast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.show();

                setTimeout(function () {
                    toast.hide();
                }, 3000); // 3 segundos
            }
        });
    </script>
@endsection
