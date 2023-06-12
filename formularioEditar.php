<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/editar.css" type="text/css">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <title>Empleado</title>
</head>

<body>
    <?php
    $id = $_POST["id"];
    require "conexionBBDD.php";
    $objConexion = Conexion();

    $sql = "select usuarios.usuLogin as empIdentificacion,usuarios.idusuario as IDident, empnombre, empCorreo from empleado inner join usuarios on usuarios.usuLogin= empleado.empIdentificacion where idEmpleado='$id' ;";
    $resultado = $objConexion->query($sql);

    ?>
    <?php while ($datos = $resultado->fetch_object()) { ?>
        <div class="formulario">
            <form action="controladorEditar.php" method="post">
                <div class="cont">
                    <!-- este es el codigo del empleado -->
                    <input class="IDemple" type="text" name="IDemple" value="<?= $id ?>">
                    <!-- ////////////////////////////////////////////////// -->
                    <label for="ident">Identificación: </label>
                    <input type="text" id="ident" name="ident" value="<?= $datos->empIdentificacion ?>">
                    <!-- este es el codigo del usuario -->
                    <input class="IDident" type="text"  name="IDident" value="<?= $datos->IDident ?>">
                    <!-- ////////////////////////////////////////////////// -->
                </div>
                
                <div class="cont">
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" value="<?= $datos->empnombre ?>">
                </div>
                <div class="cont">
                    <label for="correo">Correo: </label>
                    <input type="correo" id="correo" name="correo" value="<?= $datos->empCorreo ?>">
                </div>
                <div class="cont">
                    <label for="genero">Genero:</label>
                    <select name="genero" id="genero">
                        <option value="0">Seleccionar</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>

                </div>
                <?php
                $sql = "select idCargo,carNombre from cargos";
                $resultado = $objConexion->query($sql);
                ?>
                <div class="cont">
                    <label for="cargo">Cargo:</label>
                    <select name="cargo" id="cargo">
                        <option value="0"> Seleccionar </option>

                        <?php
                        while ($cargo = $resultado->fetch_object()) {
                        ?>
                            <option value="<?php echo $cargo->idCargo ?>">
                                <?php echo $cargo->carNombre ?> </option>
                        <?php

                        }
                        ?>

                    </select>

                </div>
                <div class="btn">
                    <input type="submit" value="Actualizar">
                </div>
                <button><a href="formularioListar.php">Volver a lista</a></button>

            </form>
        </div>
    <?php } ?>



</body>

</html>