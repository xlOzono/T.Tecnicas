<?php
    //Siempre se inicia la sesion primero
    session_start();

    include 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = hash('sha512', $password);

    // Verificar si el correo electrónico existe
    $checkEmail = mysqli_query($connection, "SELECT * FROM usuarios WHERE email='$email'");

    if(mysqli_num_rows($checkEmail) > 0){
        // Si el correo electrónico existe, verificar la contraseña
        $row = mysqli_fetch_assoc($checkEmail);
        if($row['password'] == $hashedPassword){
            $_SESSION['RUT'] = $email;
            $_SESSION['fullName'] = $row['fullName']; // Guardar el nombre en una variable de sesión
            
            // Condición adicional para redirigir según el email
            if ($email == 'adminSupremo@gym.buff.cl') {
                header("location: ../WadminMenu/AdminAforo.php"); // Redirige a mainMenu2 si el email es "xxx"
            } else {
                header("location: ../mainMenu.php"); // Redirige a mainMenu si el email es diferente
            }
            exit();
        } else {
            echo '
                <script>
                    alert("La contraseña es incorrecta, por favor verifique las entradas.");
                    window.location = "../Log&Register.php";
                </script>
            ';
            exit();
        }
    } else {
        echo '
            <script>
                alert("El correo electrónico no existe, por favor verifique las entradas.");
                window.location = "../Log&Register.php";
            </script>
        ';
        exit();
    }

    //Con los exit's matamos lo que este debajo
?>
