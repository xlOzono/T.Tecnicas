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
    $fullName = $_SESSION['fullName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
    <img src="images/logo.png" alt="Descripción de la imagen" id="miImagen" class="logo">
    <link rel="stylesheet" href="css/EstilosMainMenu.css">
</head>
<body>
    <h1 class="titulo">GYM ARICA</h1>

    <div class="rectangleSaludo"> 
        <h3 style="color: #ffffff;" id="bienvenido">Bienvenido, <?php echo htmlspecialchars($fullName); ?>!</h3>
    </div>

    <div class="container">
        <div class="card">
            <figure>
                <br><img src="images/calcul.png" id="calculadora">
            </figure>
            <div class="contenido">
                <h3 style="color: #ffffff;"> Calculadora </h3>
                <p>  Ayuda a determinar sus necesidades diarias de macronutrientes en su dieta.</p>
                <a href="zTools/Calculadora.php"> Ver Más</a>
            </div>
        </div>

        <div class="card">
            <figure>
                <img src="images/maquina.png">
            </figure>
            <div class="contenido">
                <h3 style="color: #ffffff;"> Maquinas </h3>
                <p> Aquí te proporcionamos información sobre las maquinas disponibles en el establecimiento. </p>
                <a href="#"> Ver Más </a>
            </div>
        </div>

        <div class="card">
            <figure>
                <img src="images/rutina.png">
            </figure>
            <div class="contenido">
                <h3 style="color: #ffffff;" id="rutinas">Rutinas </h3>
                <p> En esta sección te asignamos una rutina de entrenamiento según tus preferencias. </p>
                <a href="zTools/Rutinas.php"> Ver Más </a>
            </div>
        </div>

        <div class="card">
            <figure>
                <img src="images/video.png">
            </figure>
            <div class="contenido">
                <h3 style="color: #ffffff;">Video Demostración </h3>
                <p> Se presenta visualmente la ténica adecuada de como se realiza un ejercicio de la rutina</p>
                <a href="#"> Ver Más </a>
            </div>
        </div>

        <div class="card">
            <figure>
                <img src="images/envivo.png">
            </figure>
            <div class="contenido">
                <h3 style="color: #ffffff;"> En Vivo</h3>
                <p> Puede visualizar información on live sobre el establecimiento y estadisticas actualizadas </p>
                <a href="#"> Ver Más </a>
            </div>
        </div>
    </div>

    <nav>
		<ul class="menu-horizontal">
			<li>
                <a href="#" style="color: #ffffff;">Inicio</a>
            </li>
			<li>
				<a href="#" style="color: #ffffff;">Información</a>
				<ul class="menu-vertical">
					<li><a href="zTools/Rutinas.php">Rutinas</a></li>
                    <li><a href="#">Horarios</a></li>
                    <li><a href="#">Aforo</a></li>
				</ul>
			</li>
			<li>
				<a href="#" style="color: #ffffff;">Salud</a>
                <ul class="menu-vertical">
					<li><a href="zTools/Calculadora.php">Calculadora</a></li>
					<li><a href="#">Recomendaciones</a></li>
					<li><a href="#">Alimentación</a></li>
				</ul>
			</li>
			<li><a href="#" style="color: #ffffff;">Cuenta</a>
                <ul class="menu-vertical">
                    <li><a href="#">Editar</a></li>
                    <li><a href="php/closeSession.php">Cerrar Sesión</a></li>
                </ul>
            </li>
            <li><a href="#" style="color: #ffffff;">Acerca</a>
                <ul class="menu-vertical">
                    <li><a href="#">Empresa</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Derechos de Autor</a></li>
                </ul>
            </li>
		</ul>
	</nav>

    <h3 style="color: #ffffff;" id="Vida"><u><strong>Consejo Para una Vida Saludable</strong></u></h3>
    <p id="consejo" class="consejo" style="color: #ffffff;"></p>

    <script src="js/ConsejoDia.js" ></script>
    <script>
        window.onload = mostrarConsejoAleatorio;
    </script>
</body>
</html>

