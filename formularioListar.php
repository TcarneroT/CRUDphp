<?php
require "conexionBBDD.php";
$objConexion = Conexion();

$sql = "select idEmpleado,empIdentificacion, empNombre, empFechaIngreso, empCorreo,empGenero, cargos.carNombre as carNombre from empleado inner join cargos on empleado.idCargo= cargos.idCargo;";
$resultado = $objConexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/lista.css" type="text/css">

</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Fecha de ingreso</th>
                <th>Correo</th>
                <th>Genero</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($datos = $resultado->fetch_object()) { ?>

                <tr>
                    <?php $id = $datos->idEmpleado ?>
                    <td><?= $datos->empIdentificacion ?></td>
                    <td><?= $datos->empNombre ?></td>
                    <td><?= $datos->empFechaIngreso ?></td>
                    <td><?= $datos->empCorreo ?></td>
                    <td><?= $datos->empGenero ?></td>
                    <td><?= $datos->carNombre ?></td>
                    <!--aqui se inserto la linea de codigo para enviar los datos -->
                    <form action="formularioEditar.php" method="POST">
                        <input class="id" type="text" name="id" value="<?=$id?>">
                        <td class="boton"> <input type="submit" value="Editar" class="btn btn-secondary"></td>
                    </form>

                    <!-- boton para borrar-->
                    <form action="controladorBorrar.php" method="POST">

                        <td class="boton"> <input type="submit" value="Borrar" class="btn btn-secondary"></td>
                        <input class="id" type="text" name="id" value="<?= $id ?>">
                        <input class="id" type="text" name="nom" value="<?= $datos->empNombre ?>">
                    </form>

                </tr>
            <?php
            } ?>


        </tbody>
    </table>
    <div class="cont">
        <button><a href="formularioUsuarios.php">Ingresar usuarios</a></button>
        <button><a href="formularioCargos.php">Ingresar cargos</a></button>
        <button><a href="formularioEmpleado.php">Ingresar Empleado</a></button>

    </div>


</body>

</html>