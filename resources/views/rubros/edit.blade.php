@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center gap-2">
        <h2>Editar Rubro</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('rubros.update', $rubro->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $rubro->nombre) }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $rubro->descripcion) }}">
            </div>

            <div class="container d-flex justify-content-center mt-2 gap-2">
                <button type="submit" class="btn btn-warning">Actualizar</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('rubros.index') }}'">Volver</button>
            </div>

        </form>
    </div>
@endsection
