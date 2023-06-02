<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="formulario">
        <form action="controladorCargos.php" method="post">


            <div class="cont">   
            <label for="carNombre">Nom. del Cargo:</label>
            <input type="text" id="carNombre" name="carNombre">
            </div>
            
            <div class="cont">
            <label for="carSueldo">Sueldo del cargo:</label>
            <input type="text" id="carSueldo" name="carSueldo">

            </div>
            
            

            <div class="btn">
                <input type="submit" value="cargar">
            </div>



            <div class="cont">
                <a href="formularioEmpleado.php">Volver a empleado</a>

            </div>


        </form>

    </div>
</body>

</html>