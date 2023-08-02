<?php

require('../config/we_sports_connection.php');

$idUser = mysqli_real_escape_string($mysqli, $_GET['idUser']);
$estado_reserva = mysqli_real_escape_string($mysqli, $_GET['estado_reserva']);

$fechaHoraActual = date('Y-m-d H:i:s');

$sql = "UPDATE reservas SET estado_reserva = 'Completada' 
    WHERE fin_reserva < '$fechaHoraActual' 
    AND estado_reserva = 'Activa'";

$result = $mysqli->query($sql);

$getReservaById = "SELECT
                    usuarios.id AS idCliente,
                    pistas.nombre AS nombrePista,
                    reservas.id,
                    reservas.inicio_reserva,
                    reservas.fin_reserva,
                    reservas.estado_reserva,
                    reservas.fecha_creacion,
                    polideportivos.nombre AS nombrePolideportivo
                FROM reservas
                    LEFT JOIN usuarios ON reservas.id_cliente = usuarios.id
                    LEFT JOIN pistas ON reservas.id_pista = pistas.id
                    LEFT JOIN polideportivos ON pistas.id_polideportivo = polideportivos.id
                WHERE usuarios.id = $idUser AND reservas.estado_reserva = '$estado_reserva'
                ORDER BY reservas.inicio_reserva ASC;";

$result = $mysqli->query($getReservaById);

$reservas = [];

while ($fila = $result->fetch_assoc()) {
    $fechaReserva = $fila['inicio_reserva'];
    $horaInicio = date('H:i', strtotime($fechaReserva));
    $fila['hora_inicio'] = $horaInicio;
    
    $fechaReservaFin = $fila['fin_reserva'];
    $horaFin = date('H:i', strtotime($fechaReservaFin));
    $fila['hora_fin'] = $horaFin;
    
    $fechaReservaFormateada = date('m-d-Y', strtotime($fechaReserva));
    $fila['fecha_reserva'] = $fechaReservaFormateada;

    $reservas[] = $fila;
}

$JSONReservas = json_encode($reservas);

header('Content-Type: application/json');
echo $JSONReservas;

?>