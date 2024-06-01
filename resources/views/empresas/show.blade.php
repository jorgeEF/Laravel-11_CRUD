@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="text-center">Detalles de Empresa</h2>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Razon Social</th>
                <th>Nombre</th>
                <th>CUIT</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $empresa->razon_social }}</td>
                <td>{{ $empresa->nombre_fantasia }}</td>
                <td>{{ $empresa->cuit }}</td>
                <td>{{ $empresa->estado }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</div>

@endsection
