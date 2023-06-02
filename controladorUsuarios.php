<?php
require "conexionBBDD.php";
$objConexion = Conexion();

$login = $_POST["login"];
$password = $_POST["password"];



//validar que no exista el login en la BBDD

$validarLogin = "select usuLogin from usuarios where usuLogin='$login'";
$resultado = $objConexion->query($validarLogin);
$ingresar = $resultado->fetch_object();

if (is_null($ingresar)) {
    //validar caracteres del login y password
    if (preg_match("/^[a-zA-Z0-9\-_]{3,20}$/", $login)) {
        if (preg_match("/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$)(?=.*[;:\.,!¡\?¿@#\$%\^&\-_+=\(\)\[\]\{\}])).{8,20}$/", $password)) {

            //ingresar a los datos a la BBDD

            $ingresarSQL = "insert into usuarios (usuLogin,usuPassword) values ('$login','$password')";

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
                alert("Caracteres no validos para la contraseña." + "\n" +
                    "Verifica que tenga minimo un número, una letra minúscula y mayúscula, un caracter especial y sin espacios en blanco."
                );
                location.href = "formularioUsuarios.php";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Caracteres no validos para el usuario" + "\n" + "Ingrese entre 3 y 20 caracteres. Solo letras y numeros, sin espacios.");
            location.href = "formularioUsuarios.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert("el usuario ya existe, ingrese otro");
        location.href = "formularioUsuarios.php";
    </script>
<?php
}





?>