<?php
$nom= $_POST["nom"];
$id= $_POST["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/CSS/borrar.css" type="text/css">
</head>
<body>
    <div class="Ctexto">
        <h1>Realmente desea borrar el registro de: <u><?=$nom?></u></h1>
        <div class="btns">
            <button onclick="borrar()">SÍ</button>
            <button onclick="volver()">NO</button>
        </div>
    </div>
    <script>
        function borrar(){
            <?php
                require "conexionBBDD.php";
                $objConexion = Conexion();
                
                $sql = "delete from empleado where idEmpleado='$id'";
                $insertar = mysqli_query($objConexion, $sql);
                
                
                ?>
            alert("Se borró correctamente");
            document.location.href="formularioListar.php";
            

        }
        function volver(){
            document.location.href="formularioListar.php";
        }
    </script>
</body>
</html>
