@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center gap-2">

        <h2>Crear Empresa</h2>

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

        <form action="{{ route('empresas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="razon_social">Razon Social:</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social">
                @error('razon_social')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nombre_fantasia">Nombre de Fantasía:</label>
                <input type="text" class="form-control" id="nombre_fantasia" name="nombre_fantasia">
                @error('nombre_fantasia')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cuit">CUIT:</label>
                <input type="text" class="form-control" id="cuit" name="cuit">
                @error('cuit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado">
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-primary" value="Crear empresa">
                <input type="reset" class="btn btn-secondary" value="Limpiar">
                <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </form>

    </div>
@endsection
