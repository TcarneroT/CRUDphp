<?php
require "conexionBBDD.php";
$objConexion = Conexion();

$carNombre = $_POST["carNombre"];
$carSueldo = $_POST["carSueldo"];


// validacion si ya esta el cargo
$validarCargo = "select carNombre from cargos where carNombre='$carNombre'";
$resultado = $objConexion->query($validarCargo);
$cargo = $resultado->fetch_object();

if (is_null($cargo)) {
    //validar el estandar de un nombre de cargo.
    if (preg_match("/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/", $carNombre)) {
        //validar si el campo saldo tiene solo numeros y un punto. 
        if (preg_match("/^[0-9]+(\.[0-9]+)?$/", $carSueldo)) {

            //ingreso de datos a la BBDD

            $ingresarSQL = "insert into cargos (carNombre,carSueldo) values ('$carNombre',$carSueldo);";
            echo $ingresarSQL;

            $insertar = mysqli_query($objConexion, $ingresarSQL);


            if ($insertar) {

?>
                <script>
                    alert("Se guardo correctamente los datos");
                    location.href = "formularioEmpleado.php";
                </script>
            <?php

            } else {

            ?>
                <script>
                    alert(" NO se guardo correctamente los datos");
                    location.href = "formularioEmpleado.php";
                </script>
            <?php



            }
        } else {
            ?>
            <script>
                alert("Esta ingresando caracteres erroneos en el saldo");
                location.href = "formularioCargos.php";
            </script>
        <?php

        }
    } else {
        ?>
        <script>
            alert("Caracter incorrecto para el cargo");
            location.href = "formularioCargos.php";
        </script>
    <?php

    }
} else {
    ?>
    <script>
        alert("el cargo ya existe, ingrese otro. ");
        location.href = "formularioCargos.php";
    </script>
<?php
}







?>