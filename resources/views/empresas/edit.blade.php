<!DOCTYPE html>
<html>

<head>
    <title>Editar Empresa</title>
</head>

<body>
    <div class="content">
        <div class="title m-b-md">
            Editar Empresa
        </div>

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
            <table>
                <tr>
                    <td><label for="razon_social">Razon Social:</label></td>
                    <td><label for="nombre_fantasia">Nombre de Fantasía:</label></td>
                    <td><label for="cuit">CUIT:</label></td>
                    <td><label for="email">Email:</label></td>
                    <td><label for="estado">Estado:</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="razon_social" name="razon_social" value="{{ old('razon_social', $empresa->razon_social) }}">
                        @error('razon_social')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <input type="text" id="nombre_fantasia" name="nombre_fantasia" value="{{ old('nombre_fantasia', $empresa->nombre_fantasia) }}">
                        @error('nombre_fantasia')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <input type="text" id="cuit" name="cuit" value="{{ old('cuit', $empresa->cuit) }}">
                        @error('cuit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <input type="text" id="email" name="email" value="{{ old('email', $empresa->email) }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <input type="text" id="estado" name="estado" value="{{ old('estado', $empresa->estado) }}">
                        @error('estado')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Actualizar empresa"></td>
                    <td><input type="reset" value="Limpiar"></td>
                    <td><a href="{{ route('empresas.index') }}">Volver</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
