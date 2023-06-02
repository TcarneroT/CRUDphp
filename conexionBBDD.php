<?php



    function Conexion(){
        $conn= new mysqli ("localhost","root","123","empresa");
    if($conn->connect_errno){
        echo "Falla al conectarse a Mysql (".$conn->connect_errno.")";
            $conn->connect_error;
            exit();
        

    }
    else{
        
        return $conn;
    }
    }
    

?>