<?php
include("includes/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Sistema de Gestión TAP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg">

        <div class="card-body text-center p-5">

            <i class="bi bi-pc-display-horizontal display-1 text-primary"></i>

            <h1 class="mt-4">
                Sistema de Gestión TAP
            </h1>

            <p class="lead text-muted mt-3">
                Plataforma web para control de inventario, asignaciones,
                entradas, mermas y reportes empresariales.
            </p>

            <hr class="my-4">

            <div class="row mt-4">

                <div class="col-md-3">
                    <h4 class="text-primary">Trabajadores</h4>
                    <p>Administración de personal.</p>
                </div>

                <div class="col-md-3">
                    <h4 class="text-success">Productos</h4>
                    <p>Control de stock e inventario.</p>
                </div>

                <div class="col-md-3">
                    <h4 class="text-warning">Entradas</h4>
                    <p>Registro de ingresos.</p>
                </div>

                <div class="col-md-3">
                    <h4 class="text-danger">Mermas</h4>
                    <p>Control de pérdidas.</p>
                </div>

            </div>

            <a href="dashboard.php" class="btn btn-primary btn-lg mt-4 px-5">

                <i class="bi bi-box-arrow-in-right"></i>
                Ingresar al Sistema

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