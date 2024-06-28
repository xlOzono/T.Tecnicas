<!--Cambio de variables -->
<?php
/*Se usa el metodo sesion_star para enviar las variables de la tabla y el nombre */
session_start();
$_NombreEjercicios["NombreEjercicios"] = "nombres_ejercicios_biceps" ;
$_NombreDelArchivo["NombreDelArchivo"] = "PaginaBiceps.php";
?>
<!-- Plantilla de la pagina InterfazFrame3 -->
<?php 
include("InterfazFrame3.php");
?>
<!--Se reemplaza el titulo en header -->
<script> document.getElementById("NombreEjercicio").innerHTML = "Ejercicios Para Bíceps" </script>

