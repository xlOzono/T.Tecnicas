<?php

$cnx = mysqli_connect('localhost', 'root', '', 'login&&register');
$sql = "SELECT nombre, fechaInicio, fechaTermino, actividad, image FROM maquinas ORDER BY id DESC";
$rta = mysqli_query($cnx, $sql);

$maquinas = [];
while ($mostrar = mysqli_fetch_assoc($rta)) {
    $maquinas[] = $mostrar;
}

echo json_encode($maquinas);
?>
