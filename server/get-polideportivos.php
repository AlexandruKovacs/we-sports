<?php

require('../config/we_sports_connection.php');

$sql = "SELECT polideportivos.*, usuarios.email AS email_usuario
        FROM polideportivos
        INNER JOIN usuarios ON polideportivos.id_usuario = usuarios.id";

$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    $polideportivos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $hora_apertura = date('H:i', strtotime($fila['horario_apertura']));
        $hora_cierre = date('H:i', strtotime($fila['horario_cierre']));

        $fila['horario_apertura'] = $hora_apertura;
        $fila['horario_cierre'] = $hora_cierre;

        $polideportivos[] = $fila;
    }
} else {
    $polideportivos = [];
}

$JSONPolideportivos = json_encode($polideportivos);

header('Content-Type: application/json');
echo $JSONPolideportivos;
?>
