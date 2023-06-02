<?php
require "conexionBBDD.php";
$objConexion = Conexion();

$sql = "select idCargo,carNombre from cargos";
$resultado = $objConexion->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <title>Empleado</title>
</head>

<body>


    <div class="formulario">
        <form action="controladorEmpleado.php" method="post">
            <div class="cont">
                <label for="ident">Identificación: </label>
                <input type="text" id="ident" name="ident" required>

            </div>
            <div class="cont">
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="cont">
                <label for="Fingreso">Fecha Ingreso: </label>
                <input type="date" id="Fingreso" name="Fingreso" class="box" required>
            </div>

            <div class="cont">
                <label for="correo">Correo: </label>
                <input type="text" id="correo" name="correo" required>
            </div>




            <div class="cont">
                <label for="genero">Genero:</label>
                <select name="genero" id="genero">
                    <option value="0">Seleccionar</option>
                    <option value="femenino">Femenino</option>
                    <option value="masculino">Masculino</option>
                </select>

            </div>

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
                <input type="submit" value="agregar">
            </div>



            <div class="cont">
                <a href="formularioUsuarios.php">Ingresar usuarios</a>
                <a href="formularioCargos.php">Ingresar cargos</a>
            </div>
        </form>

    </div>



</body>

</html>