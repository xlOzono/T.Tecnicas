<?php
    //Siempre tenemos que iniciar sesion
    session_start();
    session_destroy();
    header("location: ../Log&Register.php");

?>