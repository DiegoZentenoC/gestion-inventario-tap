<?php
include("../../includes/conexion.php");

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $consultaEntradas = mysqli_query($conexion, "
        SELECT * FROM entradas
        WHERE id_producto = $id
    ");

    $consultaAsignaciones = mysqli_query($conexion, "
        SELECT * FROM asignaciones
        WHERE id_producto = $id
    ");

    $consultaMermas = mysqli_query($conexion, "
        SELECT * FROM mermas
        WHERE id_producto = $id
    ");

    if(
        mysqli_num_rows($consultaEntradas) > 0 ||
        mysqli_num_rows($consultaAsignaciones) > 0 ||
        mysqli_num_rows($consultaMermas) > 0
    ){

        header("Location: index.php?mensaje=relacionado");
        exit();

    } else {

        mysqli_query($conexion, "
            DELETE FROM productos
            WHERE id_producto = $id
        ");

        header("Location: index.php?mensaje=eliminado");
        exit();
    }
}

if(isset($_POST['guardar'])){

    $nombre_producto = $_POST['nombre_producto'];
    $tipo = $_POST['tipo'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos(nombre_producto, tipo, stock)
            VALUES('$nombre_producto','$tipo','$stock')";

    mysqli_query($conexion, $sql);

    header("Location: index.php?mensaje=guardado");
    exit();
}

$productos = mysqli_query($conexion, "
    SELECT * FROM productos
");
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <?php if(isset($_GET['mensaje'])){ ?>

                <?php if($_GET['mensaje'] == 'guardado'){ ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <i class="bi bi-check-circle-fill"></i>

                        Producto registrado correctamente.

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                <?php } ?>

                <?php if($_GET['mensaje'] == 'eliminado'){ ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <i class="bi bi-trash-fill"></i>

                        Producto eliminado correctamente.

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                <?php } ?>

                <?php if($_GET['mensaje'] == 'relacionado'){ ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                        No se puede eliminar este producto porque tiene movimientos registrados.

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                <?php } ?>

            <?php } ?>

            <h2 class="mb-4">

                <i class="bi bi-box-seam text-success"></i>

                Registro de Productos

            </h2>

            <form method="POST">

                <div class="mb-3">

                    <label>Nombre del producto</label>

                    <input type="text"
                           name="nombre_producto"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Tipo</label>

                    <input type="text"
                           name="tipo"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Stock inicial</label>

                    <input type="number"
                           name="stock"
                           class="form-control"
                           required>

                </div>

                <button type="submit"
                        name="guardar"
                        class="btn btn-success">

                    <i class="bi bi-save"></i>

                    Guardar Producto

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

                Productos Registrados

            </h3>

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Producto</th>

                        <th>Tipo</th>

                        <th>Stock</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php while($producto = mysqli_fetch_assoc($productos)){ ?>

                        <tr>

                            <td>
                                <?php echo $producto['id_producto']; ?>
                            </td>

                            <td>
                                <?php echo $producto['nombre_producto']; ?>
                            </td>

                            <td>
                                <?php echo $producto['tipo']; ?>
                            </td>

                            <td>
                                <?php echo $producto['stock']; ?>
                            </td>

                            <td>

                                <a href="index.php?eliminar=<?php echo $producto['id_producto']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Desea eliminar este producto?')">

                                    <i class="bi bi-trash-fill"></i>

                                    Eliminar

                                </a>

                            </td>

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