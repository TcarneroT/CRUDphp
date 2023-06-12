<?php

require "conexionBBDD.php";
$objConexion = Conexion();

$ident = $_POST["ident"];
$IDident = $_POST["IDident"];
$IDemple = $_POST["IDemple"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$genero = $_POST["genero"];
$cargo = $_POST["cargo"];
$error = false;

// falta agregar el codigo para editar el login usuario 



//validacion para identificacion

$validarIdenUsuario = "select idUsuario from usuarios where usuLogin='$ident'";
$resultado = $objConexion->query($validarIdenUsuario);
$usuario = $resultado->fetch_object();


if (is_null($usuario)) {


?>
    <?= $error = true; ?>
    <script>
        alert("el usuario no sido creado");
        location.href = "formularioEmpleado.php";
    </script>
<?php

}

//////////////////////////////////////////

//validaciones de genero y cargo

if ($genero == 0) {

?>
    <?= $error = true; ?>
    <script>
        alert("No seleccionado un genero");
        location.href = "formularioEmpleado.php";
    </script>
<?php


}
if ($cargo == 0) {

?>
    <?= $error = true; ?>
    <script>
        alert("No seleccionado un cargo");
        location.href = "formularioEmpleado.php";
    </script>
<?php


}
///////////////////////////////////////////////////////////

//validacion del correo
if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo)) {
} else {
?>
    <?= $error = true; ?>
    <script>
        alert("el correo ingresado es incorrecto");
        location.href = "formularioEmpleado.php";
    </script>
<?php
}
/////////////////////////////////////////////////
//validaciones para el nombre
if (preg_match("/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/", $nombre)) {
} else {
?>
    <?= $error = true; ?>
    <script>
        alert("Ingreso un nombre incorrecto");
        location.href = "formularioEmpleado.php";
    </script>
    <?php
}
//////////////////////////////////

if ($error == false) {
    //ingreso de datos a la BBDD

    $ingresarSQL = "update usuarios set usulogin='$ident' where idUsuario='$IDident'";
    ///////////////////vamos aqui
    $ingresarSQL1 = "update empleado set empnombre='$nombre', empCorreo='$correo', empGenero='$genero', idCargo='$cargo' where idEmpleado='$IDemple'";


    $insertar = mysqli_query($objConexion, $ingresarSQL);
    $insertar1 = mysqli_query($objConexion, $ingresarSQL1);


    if ($insertar && $insertar1) {

    ?>
        <script>
            alert("Se guardo correctamente los datos");
            location.href = "formularioListar.php";
        </script>
    <?php

    } else {

    ?>
        <script>
            alert(" NO se guardo correctamente los datos");
            location.href = "formularioListar.php";
        </script>
<?php



    }
}
