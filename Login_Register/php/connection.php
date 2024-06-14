<?php
    //Open the cage
    $connection = mysqli_connect("localhost", "root", "", "login&&register");
    
    if($connection){
        echo 'Conexión exitosa.';
    }
    else{
        echo 'No se pudo ingresar a la base de datos.';
    }
    

?>