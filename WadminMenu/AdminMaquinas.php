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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function fetchMachines() {
            $.ajax({
                url: '../php/getMachines.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                        window.location = 'Log&Register.php';
                    } else {
                        updateMachineList(data);
                    }
                }
            });
        }

        function updateMachineList(machines) {
            const machinesList = $('.machines-list ul');
            machinesList.empty();
            machines.forEach(machine => {
                const actividadesString = machine.actividad;
                machinesList.append('<li onclick="selectMachine(\'' + machine.nombre + '\', \'' + machine.fechaInicio + '\', \'' + machine.fechaTermino + '\', \'' + actividadesString + '\', \'' + machine.image + '\')">Máquina ' + machine.nombre + '</li>');
            });
        }

        $(document).ready(function() {
            fetchMachines(); // Fetch data on page load
            setInterval(fetchMachines, 5000); // Fetch data every 5 seconds
        });

        // Ajustar la altura de las barras con JavaScript
        function ajustarAlturas(actividades) {
            const numeros = actividades.split(',').map(Number); // Convertir la cadena de números en un array de números
            
            for (let i = 0; i < numeros.length && i < 18; i++) {
                const barra = document.querySelector('.bar' + (i + 1));
                if (barra) {
                    barra.style.height = (numeros[i] * 5) + 'px'; // Multiplicar por 10 para escalar visualmente
                }
            }
        }

        // Mostrar al hacer click
        function selectMachine(name, startDate, endDate, actividades, imageUrl) {
            document.getElementById('machineName').textContent = name;
            document.getElementById('startDate').textContent = startDate;
            document.getElementById('endDate').textContent = endDate;
            
            const image = document.getElementById('machineImage');
            image.src = imageUrl;
            image.style.display = 'block';

            ajustarAlturas(actividades); // Llamar a la función para ajustar las alturas de las barras
        }
    </script>
</head>
<body>
    <img src="../images/logo.png" alt="Descripción de la imagen" id="miImagen" class="logo">
    <h1 class="titulo">GYM ARICA</h1>

    <div class="rectangleSaludo"> 
        <h3 style="color: #ffffff;" id="bienvenido">Bienvenido Administrador!</h3>
    </div>

    <nav>
        <ul class="menu-horizontal">
            <li><a href="AdminAforo.php" style="color: #ffffff;">Ver aforo</a></li>
            <li><a href="AdminMaquinas.php" style="color: #ffffff;">Máquinas</a></li>
            <li>
                <a href="#" style="color: #ffffff;">Cuenta</a>
                <ul class="menu-vertical">
                    <li><a href="#">Editar</a></li>
                    <li><a href="../php/closeSession.php">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Listado de Máquinas -->
    <div class="machines-container">
        <div class="machines-list">
            <h2>Listado de Máquinas</h2>
            <ul></ul>
        </div>
        <div class="machine-info">
            <h2>Información de la Máquina</h2>
            <p><strong>Nombre:</strong> <span id="machineName">Selecciona una máquina</span></p>
            <p><strong>Fecha de Inicio:</strong> <span id="startDate">N/A</span></p>
            <p><strong>Fecha de Término:</strong> <span id="endDate">N/A</span></p>
            <img id="machineImage" src="https://www.m4fitness.cl/cdn/shop/files/RowSR-T03.jpg?v=1697748493&width=600" alt="Imagen de la máquina">
        </div>
    </div>

    <!-- Gráfico de barras -->
    <div class="chart-container1">
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

    <script src="../js/seleccionarMaquinas.js"></script>
</body>
</html>
