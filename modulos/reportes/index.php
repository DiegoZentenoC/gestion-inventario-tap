<?php
include("../../includes/conexion.php");

$productos = mysqli_query($conexion, "
    SELECT * FROM productos
");

$asignaciones = mysqli_query($conexion, "
    SELECT asignaciones.id_asignacion,
           trabajadores.nombre,
           productos.nombre_producto,
           productos.tipo,
           asignaciones.cantidad,
           asignaciones.fecha
    FROM asignaciones
    INNER JOIN trabajadores
        ON asignaciones.id_trabajador = trabajadores.id_trabajador
    INNER JOIN productos
        ON asignaciones.id_producto = productos.id_producto
");

$mermas = mysqli_query($conexion, "
    SELECT mermas.id_merma,
           productos.nombre_producto,
           productos.tipo,
           mermas.cantidad,
           mermas.motivo,
           mermas.fecha
    FROM mermas
    INNER JOIN productos
        ON mermas.id_producto = productos.id_producto
");
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Reportes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">

        <i class="bi bi-clipboard-data-fill text-dark"></i>

        Reportes del Sistema

    </h2>

    <!-- PRODUCTOS -->

    <div class="card shadow mb-4">

        <div class="card-body">

            <h4 class="mb-4">

                <i class="bi bi-box-seam text-success"></i>

                Reporte de Productos por Tipo

            </h4>

            <table class="table table-hover table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Stock Actual</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while($producto = mysqli_fetch_assoc($productos)){ ?>

                        <tr>

                            <td>
                                <?php echo $producto['nombre_producto']; ?>
                            </td>

                            <td>
                                <?php echo $producto['tipo']; ?>
                            </td>

                            <td>
                                <?php echo $producto['stock']; ?>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- ASIGNACIONES -->

    <div class="card shadow mb-4">

        <div class="card-body">

            <h4 class="mb-4">

                <i class="bi bi-person-check-fill text-info"></i>

                Reporte de Asignaciones por Trabajador

            </h4>

            <table class="table table-hover table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Trabajador</th>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while($asignacion = mysqli_fetch_assoc($asignaciones)){ ?>

                        <tr>

                            <td>
                                <?php echo $asignacion['nombre']; ?>
                            </td>

                            <td>
                                <?php echo $asignacion['nombre_producto']; ?>
                            </td>

                            <td>
                                <?php echo $asignacion['tipo']; ?>
                            </td>

                            <td>
                                <?php echo $asignacion['cantidad']; ?>
                            </td>

                            <td>
                                <?php echo $asignacion['fecha']; ?>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- MERMAS -->

    <div class="card shadow mb-4">

        <div class="card-body">

            <h4 class="mb-4">

                <i class="bi bi-exclamation-triangle-fill text-danger"></i>

                Reporte de Mermas

            </h4>

            <table class="table table-hover table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while($merma = mysqli_fetch_assoc($mermas)){ ?>

                        <tr>

                            <td>
                                <?php echo $merma['nombre_producto']; ?>
                            </td>

                            <td>
                                <?php echo $merma['tipo']; ?>
                            </td>

                            <td>
                                <?php echo $merma['cantidad']; ?>
                            </td>

                            <td>
                                <?php echo $merma['motivo']; ?>
                            </td>

                            <td>
                                <?php echo $merma['fecha']; ?>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <a href="../../dashboard.php"
       class="btn btn-dark mb-5">

        <i class="bi bi-arrow-left-circle-fill"></i>

        Volver al Dashboard

    </a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>