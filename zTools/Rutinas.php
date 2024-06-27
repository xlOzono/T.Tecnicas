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
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rutinas</title>
<link rel="stylesheet" href="../css/EstilosRutinas.css"/>
</head>
<body> 

<div class="bg"></div>


<header>
  <h1>ㅤ Rutinas</h1>
  <div class="contenido"><a href="../mainMenu.php">VOLVER</a></div>
</header>

<div class="btn-group">
    <button class="bar-item" onclick="openTab('Rutina 1')">Rutina 1</button>
    <button class="bar-item" onclick="openTab('Rutina 2')">Rutina 2</button>
    <button class="bar-item" onclick="openTab('Rutina 3')">Rutina 3</button>
  </div>

  <div class="rectangle"><h2>Escoge una rutina</h2></div>


  <div id="Rutina 1" class="wrapper" style="display:none">
    <div class="col1"><h2>EJERCICIO 1</h2>
      <h3>&ensp; Nombre del ejercicio</h3>
    </div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 2</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 3</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 4</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 5</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
  </div>
  
  <div id="Rutina 2" class="wrapper" style="display:none">
    <div class="col1"><h2>EJERCICIO 1.2</h2>
      <h3>&ensp; Nombre del ejercicio</h3>
    </div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 2.2</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 3.2</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 4.2</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 5.2</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
  </div>
  
  <div id="Rutina 3" class="wrapper" style="display:none">
    <div class="col1"><h2>EJERCICIO 1.3</h2>
      <h3>&ensp; Nombre del ejercicio</h3>
    </div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 2.3</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 3.3</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 4.3</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
    <div class="col1"><h2>EJERCICIO 5.3</h2>
      <h3>&ensp;Nombre del ejercicio</h3></div>
    <div class="col2"><h2>XX SERIES&emsp;XX REPS</h2></div>
  </div>

  <script src="../js/Rutinas.js" ></script>
</body>
</html>


      