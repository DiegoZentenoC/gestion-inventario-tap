<?php
include("../../includes/conexion.php");

$productos = mysqli_query($conexion, "SELECT * FROM productos");

if(isset($_POST['guardar'])){

    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $motivo = $_POST['motivo'];
    $fecha = $_POST['fecha'];

    $stock_actual = mysqli_query($conexion, "SELECT stock FROM productos WHERE id_producto = $id_producto");
    $producto = mysqli_fetch_assoc($stock_actual);

    if($producto['stock'] >= $cantidad){

        $sql = "INSERT INTO mermas(id_producto, cantidad, motivo, fecha)
                VALUES('$id_producto','$cantidad','$motivo','$fecha')";

        mysqli_query($conexion, $sql);

        mysqli_query($conexion, "
            UPDATE productos
            SET stock = stock - $cantidad
            WHERE id_producto = $id_producto
        ");

        header("Location: index.php?mensaje=guardado");
        exit();

    } else {
        header("Location: index.php?mensaje=stock");
        exit();
    }
}

$historial = mysqli_query($conexion, "
    SELECT mermas.id_merma,
           productos.nombre_producto,
           productos.tipo,
           mermas.cantidad,
           mermas.motivo,
           mermas.fecha
    FROM mermas
    INNER JOIN productos
        ON mermas.id_producto = productos.id_producto
    ORDER BY mermas.fecha DESC
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Mermas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'guardado'){ ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <i class="bi bi-check-circle-fill"></i>

                    Merma registrada correctamente.

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            <?php } ?>

            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'stock'){ ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">

                    <i class="bi bi-exclamation-triangle-fill"></i>

                    No hay stock suficiente para registrar la merma.

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            <?php } ?>

            <h2 class="mb-4">

                <i class="bi bi-exclamation-triangle-fill text-danger"></i>

                Registro de Mermas

            </h2>

            <form method="POST">

                <div class="mb-3">
                    <label>Producto</label>

                    <select name="id_producto"
                            class="form-control"
                            required>

                        <option value="">Seleccione</option>

                        <?php while($producto = mysqli_fetch_assoc($productos)){ ?>

                            <option value="<?php echo $producto['id_producto']; ?>">
                                <?php echo $producto['nombre_producto']; ?> - Stock actual: <?php echo $producto['stock']; ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Cantidad</label>

                    <input type="number"
                           name="cantidad"
                           class="form-control"
                           min="1"
                           required>
                </div>

                <div class="mb-3">
                    <label>Motivo</label>

                    <input type="text"
                           name="motivo"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Fecha</label>

                    <input type="date"
                           name="fecha"
                           class="form-control"
                           required>
                </div>

                <button type="submit"
                        name="guardar"
                        class="btn btn-danger">

                    <i class="bi bi-save"></i>

                    Registrar Merma

                </button>

                <a href="../../dashboard.php"
                   class="btn btn-dark">

                    <i class="bi bi-arrow-left-circle-fill"></i>

                    Volver al Dashboard

                </a>

            </form>

            <hr class="my-5">

            <h3 class="mb-4">

                <i class="bi bi-table"></i>

                Historial de Mermas

            </h3>

            <table class="table table-hover table-bordered table-striped align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while($merma = mysqli_fetch_assoc($historial)){ ?>

                        <tr>
                            <td><?php echo $merma['id_merma']; ?></td>
                            <td><?php echo $merma['nombre_producto']; ?></td>
                            <td><?php echo $merma['tipo']; ?></td>
                            <td><?php echo $merma['cantidad']; ?></td>
                            <td><?php echo $merma['motivo']; ?></td>
                            <td><?php echo $merma['fecha']; ?></td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>