<?php

session_start(); //Iniciamos sesion

if (!isset($_SESSION['RUT'])){ //isset es si existe, por tanto sino existe la variable de sesion usuario pues envia el mensaje
    echo'
        <script>
            alert("Por favor, inicie sesión");
            window.location = "Log&Register.php";
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
    <title>Gimnasio</title>
    <link rel="stylesheet" href="../css/EstilosAdmin.css">

    
    <!--La magia de las técnicas de AJAX, cada 5 segundos comprueba los cambios en la base de datos LOCURA!!!!!!-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function fetchAforoData() {
            $.ajax({
                url: '../php/getAforoData.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                        window.location = 'Log&Register.php';
                    } else {
                        $('#aforoActual').text(data.usuariosActivos);
                        $('#usoMaquinas').text(data.maquinasActivas);
                    }
                }
            });
        }

        $(document).ready(function() {
            fetchAforoData(); // Fetch data on page load
            setInterval(fetchAforoData, 5000); // Fetch data every 5 seconds
        });
    </script>
    
</head>
<body>
    <img src="../images/logo.png" alt="Descripción de la imagen" id="miImagen" class="logo">
    <h1 class="titulo">GYM ARICA</h1>

    <div class="rectangleSaludo"> 
        <h3 style="color: #ffffff;" id="bienvenido">Bienvenido Administrador</h3>
    </div>

    <nav>
        <ul class="menu-horizontal">
            <li><a href="AdminAforo.php" style="color: #ffffff;">Ver aforo</a></li>
            <li><a href="AdminMaquinas.php" style="color: #ffffff;">Maquinas</a></li>
            <li><a href="#" style="color: #ffffff;">Actividad</a></li>
            <li>
                <a href="#" style="color: #ffffff;">Cuenta</a>
                <ul class="menu-vertical">
                    <li><a href="#">Editar</a></li>
                    <li><a href="../php/closeSession.php">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="info-container">
        <div class="info-box">
            <h2>Aforo Actual</h2>
            <p id="aforoActual"><?php echo $usuariosActivos; ?></p>
        </div>
        <div class="info-box">
            <h2>Uso de Máquinas</h2>
            <p id="usoMaquinas"><?php echo $maquinasActivas; ?></p>
        </div>
    </div>

    <div class="chart-container">
        <div class="bar bar1" data-hour="7am"></div>
        <div class="bar bar2" data-hour="8am"></div>
        <div class="bar bar3" data-hour="9am"></div>
        <div class="bar bar4" data-hour="10am"></div>
        <div class="bar bar5" data-hour="11am"></div>
        <div class="bar bar6" data-hour="12pm"></div>
        <div class="bar bar7" data-hour="1pm"></div>
        <div class="bar bar8" data-hour="2pm"></div>
        <div class="bar bar9" data-hour="3pm"></div>
        <div class="bar bar10" data-hour="4pm"></div>
        <div class="bar bar11" data-hour="5pm"></div>
        <div class="bar bar12" data-hour="6pm"></div>
        <div class="bar bar13" data-hour="7pm"></div>
        <div class="bar bar14" data-hour="8pm"></div>
        <div class="bar bar15" data-hour="9pm"></div>
        <div class="bar bar16" data-hour="10pm"></div>
        <div class="bar bar17" data-hour="11pm"></div>
        <div class="bar bar18" data-hour="12am"></div>
    </div>
    <script src="../js/verAforo.js"></script>
</body>
</html>
