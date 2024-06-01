<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Empresa</title>
</head>
<body>
    <div class="content">
        <div class="title m-b-md">
            Detalles de Empresa
        </div>

        <table>
            <tr>
                <th>Razon Social</th>
                <th>Nombre</th>
                <th>CUIT</th>
                <th>Estado</th>
            </tr>
            <tr>
                <td>{{ $empresa->razon_social }}</td>
                <td>{{ $empresa->nombre_fantasia }}</td>
                <td>{{ $empresa->cuit }}</td>
                <td>{{ $empresa->estado }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
