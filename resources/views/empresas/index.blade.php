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

        @isset ($message)
            <div class="alert alert-info">
                <ul>
                    <li>{{ $message }}</li>
                </ul>
            </div>
        @endisset

        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('empresas.create') }}'">Nueva empresa</button>


        <h2>Listado de Empresas</h2>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Razon Social</th>
                    <th>Nombre</th>
                    <th>CUIT</th>
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
                        <td>{{ $empresa->estado }}</td>
                        <td>
                            <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('empresas.delete', $empresa->id) }}" method="POST" style="display:inline"
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
@endsection
