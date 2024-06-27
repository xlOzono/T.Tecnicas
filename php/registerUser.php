<?php

    //Damos acceso a la caja fuerte, por tanto ya se tienen acceso a la variable connection
    include 'connection.php';

    //Almacenamos en variables los nombres de las etiquetas que recibiran los inputs
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $RUT = $_POST['RUT'];
    $phoneNumber = $_POST['phoneNumber'];
    $passwordBaby = $_POST['password']; //Baby because is not encrypted
    $password = hash('sha512', $passwordBaby); //Pasamos la password de arriba a la password de abajo para almacenarla en password

    //Para guardar en nuestras tabla, insertamos en cada variable de la tabla la variable que le coresponde por mero orden
    $query = "INSERT INTO usuarios(fullName, email, RUT, phoneNumber, password) 
              VALUES('$fullName', '$email', '$RUT', '$phoneNumber', '$password')";

    //Verificar que el email no se repita en la base de datos, para tener acceso a la tabla usuario necesitamos pasar primero por la connection
    $checkEmail = mysqli_query($connection, "SELECT * FROM usuarios WHERE email='$email' "); //Hace una conexion, seleccionar la tabla usuario y nos verifica donde el email de la tabla sea igual al correo que ingresamos como input

    if(mysqli_num_rows($checkEmail) > 0){ //Si encuentra una fila que coincida con ese correo o en otras palabras > 0
        echo '
            <script>
                alert("Este correo electrónico ya está registrado, prueba con otro correo electrónico..");
                window.location = "../Log&Register.php";
            </script>
        ';
        exit(); //El codigo de abajo no se ejecutara
    } 

    //Verificar que el RUT no se repita en la base de datos
    $checkRUT = mysqli_query($connection, "SELECT * FROM usuarios WHERE RUT='$RUT'"); 

    if(mysqli_num_rows($checkRUT) > 0){ 
        echo '
            <script>
                alert("Este RUT ya está registrado, ingrese otro RUT valido.");
                window.location = "../Log&Register.php";
            </script>
        ';
        exit(); //El codigo de abajo no se ejecutara
    } 

    $execute = mysqli_query($connection, $query); //Abrimos la caja fuerte y luego tomamos el libro que seria la tabla usuario, y VALUES seria el lapiz para sobrescribir

    if($execute){
        echo '
            <script>
                alert("Registro exitoso.");
                window.location = "../Log&Register.php";
            </script>
        ';
    }
    else{
        echo '
            <script>
                alert("Inténtalo de nuevo, la usuario no pudo registrarse.");
                window.location = "../Log&Register.php";
            </script>
        ';
    }

    mysqli_close($connection);

?>