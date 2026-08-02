<?php
include("../../includes/conexion.php");

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $consulta = mysqli_query($conexion, "
        SELECT * FROM asignaciones 
        WHERE id_trabajador = $id
    ");

    if(mysqli_num_rows($consulta) > 0){

        header("Location: index.php?mensaje=relacionado");
        exit();

    } else {

        mysqli_query($conexion, "
            DELETE FROM trabajadores 
            WHERE id_trabajador = $id
        ");

        header("Location: index.php?mensaje=eliminado");
        exit();
    }
}

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO trabajadores(nombre, cargo, telefono)
            VALUES('$nombre','$cargo','$telefono')";

    mysqli_query($conexion, $sql);

    header("Location: index.php?mensaje=guardado");
    exit();
}

$trabajadores = mysqli_query($conexion, "
    SELECT * FROM trabajadores
");
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Trabajadores</title>

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

                        Trabajador registrado correctamente.

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                <?php } ?>

                <?php if($_GET['mensaje'] == 'eliminado'){ ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <i class="bi bi-trash-fill"></i>

                        Trabajador eliminado correctamente.

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                <?php } ?>

                <?php if($_GET['mensaje'] == 'relacionado'){ ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                        No se puede eliminar este trabajador porque tiene asignaciones registradas.

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                <?php } ?>

            <?php } ?>

            <h2 class="mb-4">

                <i class="bi bi-people-fill text-primary"></i>

                Registro de Trabajadores

            </h2>

            <form method="POST">

                <div class="mb-3">

                    <label>Nombre</label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Cargo</label>

                    <input type="text"
                           name="cargo"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Teléfono</label>

                    <input type="text"
                           name="telefono"
                           class="form-control">

                </div>

                <button type="submit"
                        name="guardar"
                        class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Guardar Trabajador

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

                Trabajadores Registrados

            </h3>

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Nombre</th>

                        <th>Cargo</th>

                        <th>Teléfono</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php while($trabajador = mysqli_fetch_assoc($trabajadores)){ ?>

                        <tr>

                            <td><?php echo $trabajador['id_trabajador']; ?></td>

                            <td><?php echo $trabajador['nombre']; ?></td>

                            <td><?php echo $trabajador['cargo']; ?></td>

                            <td><?php echo $trabajador['telefono']; ?></td>

                            <td>

                                <a href="index.php?eliminar=<?php echo $trabajador['id_trabajador']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Desea eliminar este trabajador?')">

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