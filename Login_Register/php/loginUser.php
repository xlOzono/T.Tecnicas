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

    if(mysqli_num_rows($checkLogin) > 0){
        $_SESSION['RUT'] = $email;
        header("location: ../mainMenu.php"); #Si es valido el login, entonces nos redirigue a la pagina de bienvenida
        exit;
    }
    else{
        echo '
            <script>
                alert("El usuario no existe, por favor verifique las entradas.");
                windows.location = "../index.php";
            </script>
        ';
        exit;
    }
    //Con los exit's matamos lo que este debajo

?>