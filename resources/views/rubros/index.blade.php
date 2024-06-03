@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Rubros</h2>
        <div class="container d-flex justify-content-center">
            <a href="{{ route('rubros.create') }}" class="btn btn-primary">Nuevo Rubro</a>
        </div>
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
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rubros as $rubro)
                    <tr>
                        <td>{{ $rubro->nombre }}</td>
                        <td>{{ $rubro->descripcion }}</td>
                        <td>
                            <a href="{{ route('rubros.edit', $rubro->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('rubros.destroy', $rubro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container d-flex justify-content-center mt-2">
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('empresas.index') }}'">Volver</button>
        </div>
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
