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
    <title>Calculadora de Calorías</title>
    <link rel="stylesheet" href="../css/EstilosCalculadora.css">
    
</head>
<body>

<header>
    <h1>Calculadora</h1>
    <a href="../mainMenu.php" class="volver-btn">VOLVER</a>
</header>

<div class="container">
    <div class="calculadora">
        <h1>Nutrición</h1>
        <form id="calorie-form">
            <div class="form-group">
                <label>Género:</label>
                <label class="radio-label"><input type="radio" name="genero" value="Masculino" checked> Masculino</label>
                <label class="radio-label"><input type="radio" name="genero" value="Femenino"> Femenino</label>
            </div>
            <div class="form-group">
                <label>Edad:</label>
                <input type="number" id="edad" required>
            </div>
            <div class="form-group">
                <label>Peso (kg):</label>
                <input type="number" id="peso" required>
            </div>
            <div class="form-group">
                <label>Altura (cm):</label>
                <input type="number" id="altura" required>
            </div>
            <div class="form-group">
                <label>Actividad:</label>
                <select id="actividad" required>
                    <option value="1.2">Sedentario</option>
                    <option value="1.375">Ligera actividad</option>
                    <option value="1.55">Actividad moderada</option>
                    <option value="1.725">Actividad intensa</option>
                    <option value="1.9">Actividad muy intensa</option>
                </select>
            </div>
            <div class="form-group">
                <label>% Grasa Corporal (opcional):</label>
                <input type="number" id="grasaCorporal">
            </div>
            <button type="button" class="btn" onclick="calcularCalorias()">Calcular</button>
        </form>
    </div>
    <div class="resultados">
        <h2>Resultados</h2>
        <div class="results" id="results" style="display:none;">
            <div><span>Mantención:</span> <span id="maintenance"></span> Calorías/día</div>
            <div><span>Déficit:</span> <span id="deficit"></span> Calorías/día</div>
            <div><span>Superávit:</span> <span id="superavit"></span> Calorías/día</div>
            <div>
                <h2>Macronutrientes</h2>
                <div>Proteína: <span id="proteina"></span> g</div>
                <div>Grasas: <span id="grasa"></span> g</div>
                <div>Carbohidratos: <span id="carbohidratos"></span> g</div>
            </div>
        </div>
    </div>
</div>

<script src="../js/Calculadora.js" ></script>

</body>
</html>
