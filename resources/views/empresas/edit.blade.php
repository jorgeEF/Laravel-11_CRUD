@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="text-center">Editar Empresa</h2>

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

        <form action="{{ route('empresas.updatePartial', $empresa->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="razon_social">Razon Social:</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social"
                    value="{{ old('razon_social', $empresa->razon_social) }}">
                @error('razon_social')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre_fantasia">Nombre de Fantasía:</label>
                <input type="text" class="form-control" id="nombre_fantasia" name="nombre_fantasia"
                    value="{{ old('nombre_fantasia', $empresa->nombre_fantasia) }}">
                @error('nombre_fantasia')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cuit">CUIT:</label>
                <input type="text" class="form-control" id="cuit" name="cuit"
                    value="{{ old('cuit', $empresa->cuit) }}">
                @error('cuit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email"
                    value="{{ old('email', $empresa->email) }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado"
                    value="{{ old('estado', $empresa->estado) }}">
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group text-center mt-2">
                <input type="submit" class="btn btn-warning" value="Actualizar empresa">
                <input type="reset" class="btn btn-secondary" value="Limpiar">
                <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>

@endsection
