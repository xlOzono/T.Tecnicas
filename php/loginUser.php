<?php
    //Siempre se inicia la sesion primero
    session_start();

    include 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    //Seleccioname la tabla usuario y apuntame a correo para ver si email == email y tambien si password == password, entones retorna TRUE
    $checkLogin = mysqli_query($connection, "SELECT * FROM usuarios WHERE email='$email' 
    and password='$password'");

    if(mysqli_num_rows($checkLogin) > 0){ #Existe aunque sea uno
        $row = mysqli_fetch_assoc($checkLogin); // Obtener los datos del usuario

        $_SESSION['RUT'] = $email;
        $_SESSION['fullName'] = $row['fullName']; // Guardar el nombre en una variable de sesión
        
        // Condición adicional para redirigir según el email
        if ($email == 'adminSupremo@gym.buff.cl') {
            header("location: ../WadminMenu/AdminAforo.php"); // Redirige a mainMenu2 si el email es "xxx"
        } else {
            header("location: ../mainMenu.php"); // Redirige a mainMenu si el email es diferente
        }
         
        exit;
    }
    else{
        echo '
            <script>
                alert("El usuario no existe, por favor verifique las entradas.");
                windows.location = "../Log&Register.php";
            </script>
        ';
        exit;
    }
    //Con los exit's matamos lo que este debajo

?>