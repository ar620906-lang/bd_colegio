<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_colegio2");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta
$sql = "SELECT * FROM personas";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f3f3;
            margin: 40px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            max-width: 1100px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Listado de Personas</h2>

    <?php if ($resultado->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha de Nacimiento</th>
                <th>Ciudad</th>
                <th>Promedio</th>
                <th>Creado En</th>
            </tr>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila["id"] ?></td>
                    <td><?= $fila["nombre"] ?></td>
                    <td><?= $fila["apellido"] ?></td>
                    <td><?= $fila["correo"] ?></td>
                    <td><?= $fila["telefono"] ?></td>
                    <td><?= $fila["fecha_nacimiento"] ?></td>
                    <td><?= $fila["ciudad"] ?></td>
                    <td><?= $fila["promedio"] ?></td>
                    <td><?= $fila["creado_en"] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No hay registros para mostrar.</p>
    <?php endif; ?>

    <?php $conexion->close(); ?>
</div>
</body>
</html>
