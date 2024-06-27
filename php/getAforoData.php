<?php
$cnx = mysqli_connect('localhost', 'root', '', 'login&&register');

$sql = "SELECT estado FROM usuarios ORDER BY id DESC";
$rta = mysqli_query($cnx, $sql);

$sql2 = "SELECT estado FROM maquinas ORDER BY id DESC";
$rta2 = mysqli_query($cnx, $sql2);

$usuariosActivos = 0;
while ($mostrar = mysqli_fetch_assoc($rta)) {
    if ($mostrar['estado'] == 1) {
        $usuariosActivos++;
    }
}

$maquinasActivas = 0;
while ($mostrar2 = mysqli_fetch_assoc($rta2)) {
    if ($mostrar2['estado'] == 1) {
        $maquinasActivas++;
    }
}

echo json_encode([
    'usuariosActivos' => $usuariosActivos,
    'maquinasActivas' => $maquinasActivas
]);
?>