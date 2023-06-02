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
        <form action="controladorUsuarios.php" method="post">
            <div class="cont">
                <label for="login">Ingrese un nuevo usuario:</label>
                <input type="text" id="login" name="login">
            </div>
            <div class="cont">
                <label for="password">Ingrese una contraseña:</label>
                <input type="password" id="password" name="password">

            </div>
            <div class="btn">

                <input type="submit" value="agregar">
            </div>
            <div class="cont">

                <a href="formularioEmpleado.php">Volver a Empleado</a>
            </div>


        </form>


    </div>
</body>

</html>