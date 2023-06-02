<?php

    require "conexionBBDD.php";
    $objConexion = Conexion ();

    $ident= $_POST["ident"];
    $nombre= $_POST["nombre"];
    $Fingreso= $_POST["Fingreso"];
    $correo= $_POST["correo"];
    $genero= $_POST["genero"];
    $cargo= $_POST["cargo"];
    
    


    //validacion para identificacion

    $validarIdenUsuario= "select idUsuario from usuarios where usuLogin='$ident'";
    $resultado=$objConexion->query($validarIdenUsuario);
    $usuario=$resultado->fetch_object();
    

    if(is_null($usuario)){

        
        ?>
        <script>alert("el usuario no sido creado");
        location.href="formularioEmpleado.php";
        </script>
        <?php
        
    }

    //////////////////////////////////////////

    //validaciones de genero y cargo

    if ($genero==0 ){

        ?>
        <script>alert("No seleccionado un genero");
        location.href="formularioEmpleado.php";
        </script>
        <?php


    }
    if ($cargo==0 ){

        ?>
        <script>alert("No seleccionado un cargo");
        location.href="formularioEmpleado.php";
        </script>
        <?php


    }
    ///////////////////////////////////////////////////////////

    //validacion del correo
    if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo)) {
         
      }
    else{
        ?>
        <script>alert("el correo ingresado es incorrecto");
        location.href="formularioEmpleado.php";
        </script>
        <?php
    }
    /////////////////////////////////////////////////
    //validaciones para el nombre
    if(preg_match("/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/", $nombre)){

    }
   else{
    ?>
    <script>alert("Ingreso un nombre incorrecto");
    location.href="formularioEmpleado.php";
    </script>
    <?php
   }
   //////////////////////////////////
   //validar si ya se ingreso el usuario anteriormente. 

   $validarIdenUsuario= "select empIdentificacion from empleado where empIdentificacion='$ident'";
    $resultado=$objConexion->query($validarIdenUsuario);
    $usuario=$resultado->fetch_object();
    

    if(is_null($usuario)){

        //ingreso de datos a la BBDD

         $ingresarSQL="insert into empleado (empIdentificacion,empNombre,empFechaIngreso,empCorreo,empGenero,idCargo) values ('$ident','$nombre','$Fingreso','$correo','$genero',$cargo)";

        $insertar= mysqli_query($objConexion,$ingresarSQL);
   

            if($insertar){

                ?>
                    <script>alert("Se guardo correctamente los datos");
                    location.href="formularioEmpleado.php";
                    </script>
                    <?php

             }
            else {
                 
                ?>
                    <script>alert(" NO se guardo correctamente los datos");
                    location.href="formularioEmpleado.php";
                    </script>
                    <?php



            }

        
        
        
    }
    else {
        ?>
        <script>alert("el usuario ha sido ingresado anteriormente");
        location.href="formularioEmpleado.php";
        </script>
        <?php

    }
   


















    

?>
