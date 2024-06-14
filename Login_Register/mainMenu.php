<?php

    session_start(); //Iniciamos sesion

    if (!isset($_SESSION['RUT'])){ //isset es si existe, por tanto sino existe la variable de sesion usuario pues envia el mensaje
        echo'
            <script>
                alert("Por favor, inicie sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();  //Destruye cualquier sesion 
        die(); //Mata tal cual el codigo que esta abajo
    }
    //session_destroy(); Mata el codigo para tener si o si que iniciar sesion para poder ingresar a la pagina
    //ALERTA CON ESTE CODIGO, MUY PROBABLE SU ELIMINACION YA QUE ES MERA PRUEBA
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <h1>Bienvenido al GYM</h1>
</head>
<body>
    <a href="php/closeSession.php">Cerrar sesión</a>
</body>
</html>