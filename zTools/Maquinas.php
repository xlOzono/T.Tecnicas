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
    <link rel="stylesheet" href="../css/EstilosMaquinas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function fetchMachines() {
            $.ajax({
                url: '../php/showMachines.php',
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
                const estadoMensaje = (machine.estado == 1) ? 'Disponible' : 'No disponible';
                machinesList.append('<li onclick="selectMachine(\'' + machine.nombre + '\', \'' + machine.descripcion + '\', \'' + estadoMensaje + '\', \'' + machine.image + '\')">Máquina ' + machine.nombre + '</li>');
            });
        }

        $(document).ready(function() {
            fetchMachines(); // Fetch data on page load
            setInterval(fetchMachines, 5000); // Fetch data every 5 seconds
        });


        // Mostrar al hacer click
        function selectMachine(name, description, state, imageUrl) {
            document.getElementById('machineName').textContent = name;
            document.getElementById('description').textContent = description;
            document.getElementById('state').textContent = state;
            
            const image = document.getElementById('machineImage');
            image.src = imageUrl;
            image.style.display = 'block';

        }
    </script>
</head>
<body>

    <header>
    <h1>Máquinas</h1>
    <a href="../mainMenu.php" class="volver-btn">VOLVER</a>
    </header>

    <!-- Listado de Máquinas -->
    <div class="machines-container">
        <div class="machines-list">
            <h2>Listado de Máquinas</h2>
            <ul></ul>
        </div>
        <div class="machine-info">
            <h2>Información de la Máquina</h2>
            <p><strong>Nombre:</strong> <span id="machineName">Selecciona una máquina</span></p>
            <p><strong>Descripción:</strong> <span id="description">N/A</span></p>
            <p><strong>Estado:</strong> <span id="state">N/A</span></p>
            <img id="machineImage" src="https://www.m4fitness.cl/cdn/shop/files/RowSR-T03.jpg?v=1697748493&width=600" alt="Imagen de la máquina">
        </div>
    </div>

    <script src="../js/verMaquina.js"></script>
</body>
</html>
