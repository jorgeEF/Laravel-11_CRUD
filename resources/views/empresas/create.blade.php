<!DOCTYPE html>
<html>

<head>
    <title>Crear de Empresa</title>
</head>

<body>
    <div class="content">
        <div class="title m-b-md">
            Crear Empresa
        </div>

        <form action="{{ route('empresas.store') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="razon_social">Razon Social:</label></td>
                    <td><label for="nombre_fantasia">Nombre de Fantasía:</label></td>
                    <td><label for="cuit">CUIT:</label></td>
                    <td><label for="cuit">Email:</label></td>
                    <td><label for="estado">Estado:</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="razon_social" name="razon_social"></td>
                    <td><input type="text" id="nombre_fantasia" name="nombre_fantasia"></td>
                    <td><input type="text" id="cuit" name="cuit"></td>
                    <td><input type="text" id="email" name="email"></td>
                    <td><input type="text" id="estado" name="estado"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Crear empresa"></td>
                    <td><input type="reset" value="Limpiar"></td>
                    <td><a href="{{ route('empresas.index') }}">Volver</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
