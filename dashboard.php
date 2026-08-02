<?php
include("includes/conexion.php");

$total_trabajadores = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM trabajadores"));

$total_productos = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM productos"));

$total_asignaciones = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM asignaciones"));

$total_mermas = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM mermas"));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema TAP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">

            <i class="bi bi-pc-display-horizontal fs-2 text-white me-3"></i>

            <div>

                <h4 class="text-white m-0">
                    Sistema de Gestión TAP
                </h4>

                <small class="text-light">
                    Plataforma de control de inventario y asignaciones
                </small>

            </div>

        </div>

        <a href="index.php" class="btn btn-light btn-sm">
            <i class="bi bi-box-arrow-right"></i>
            Salir
        </a>

    </div>
</nav>

<div class="container mt-5">
    <div class="row mb-4">

    <div class="col-md-3">
        <div class="card shadow border-0 bg-primary text-white">
            <div class="card-body text-center">
                <h5>Total Trabajadores</h5>
                <h2><?php echo $total_trabajadores; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 bg-success text-white">
            <div class="card-body text-center">
                <h5>Total Productos</h5>
                <h2><?php echo $total_productos; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 bg-info text-white">
            <div class="card-body text-center">
                <h5>Asignaciones</h5>
                <h2><?php echo $total_asignaciones; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 bg-danger text-white">
            <div class="card-body text-center">
                <h5>Mermas</h5>
                <h2><?php echo $total_mermas; ?></h2>
            </div>
        </div>
    </div>

</div>

    <div class="mb-4">
        <h2 class="fw-bold">Menú principal</h2>

<p class="text-muted">
    Plataforma de gestión de inventario, trabajadores, asignaciones y control de mermas.
</p>

<p class="text-secondary">
    <i class="bi bi-calendar-event"></i>

    <?php
    date_default_timezone_set('America/Santiago');
    echo date('d/m/Y H:i');
    ?>
</p>
    </div>

    <div class="row g-4">

        <!-- Trabajadores -->
        <div class="col-md-4">

            <a href="modulos/trabajadores/index.php" class="text-decoration-none">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-people-fill display-4 text-primary"></i>

                        <h4 class="mt-3 text-dark">
                            Trabajadores
                        </h4>

                        <p class="text-muted">
                            Registro y administración de trabajadores.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Productos -->
        <div class="col-md-4">

            <a href="modulos/productos/index.php" class="text-decoration-none">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-box-seam display-4 text-success"></i>

                        <h4 class="mt-3 text-dark">
                            Productos
                        </h4>

                        <p class="text-muted">
                            Gestión de productos y stock.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Entradas -->
        <div class="col-md-4">

            <a href="modulos/entradas/index.php" class="text-decoration-none">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-box-arrow-in-down display-4 text-warning"></i>

                        <h4 class="mt-3 text-dark">
                            Entradas
                        </h4>

                        <p class="text-muted">
                            Registro de ingreso de productos.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Asignaciones -->
        <div class="col-md-4">

            <a href="modulos/asignaciones/index.php" class="text-decoration-none">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-person-check-fill display-4 text-info"></i>

                        <h4 class="mt-3 text-dark">
                            Asignaciones
                        </h4>

                        <p class="text-muted">
                            Asignación de productos a trabajadores.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Mermas -->
        <div class="col-md-4">

            <a href="modulos/mermas/index.php" class="text-decoration-none">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-exclamation-triangle-fill display-4 text-danger"></i>

                        <h4 class="mt-3 text-dark">
                            Mermas
                        </h4>

                        <p class="text-muted">
                            Control de pérdidas y productos dañados.
                        </p>

                    </div>

                </div>

            </a>

        </div>

        <!-- Reportes -->
        <div class="col-md-4">

            <a href="modulos/reportes/index.php" class="text-decoration-none">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <i class="bi bi-clipboard-data-fill display-4 text-dark"></i>

                        <h4 class="mt-3 text-dark">
                            Reportes
                        </h4>

                        <p class="text-muted">
                            Informes por trabajador, tipo y merma.
                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>
<footer class="bg-dark text-white text-center p-4 mt-5">

    <h5>Sistema de Gestión TAP</h5>

    <p class="mb-1">
        Trabajo de Aplicación Práctica - AIEP
    </p>

    <small>
        Desarrollado por Diego Zenteno | Programación y Análisis de Sistemas | 2026
    </small>

</footer>
</body>
</html>