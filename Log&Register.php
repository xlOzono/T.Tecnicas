<?php

    //Mientras exista una sesion abierta, nos mandara a la pagina principal, parecido a otras paginas de la web
    session_start();
    if(isset($_SESSION['RUT'])){
        header("location: mainMenu.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse y iniciar sesión</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/EstilosLogReg.css">
</head>
<body>
        <img class="logo" src="images/logo2.png" alt="Logo">
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/loginUser.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="email">
                        <input type="password" placeholder="Contraseña" name="password">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/registerUser.php" method="POST" class="formulario__register"> <!--Asociamos mediante action="php/registerUser.php"-->
                        <h2>Regístrarse</h2>                                                         <!--Por default el method es GET-->
                        <input type="text" placeholder="Nombre completo" name="fullName">
                        <input type="text" placeholder="Correo Electronico" name="email">
                        <input type="text" placeholder="RUT" name="RUT">
                        <input type="text" placeholder="Teléfono" name="phoneNumber">
                        <input type="password" placeholder="Contraseña" name="password">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="js/loginRegister.js"></script>
</body>
</html>