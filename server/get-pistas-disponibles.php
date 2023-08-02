<?php

require('../config/we_sports_connection.php');

$selectedPista = $_POST['pista_id'];
$selectedFecha = $_POST['fecha'];
$selectedHoraInicio = $_POST['hora_inicio'] . ':00';
$selectedHoraFin = $_POST['hora_fin'] . ':00';

$sql = "SELECT *
        FROM reservas
        WHERE id_pista = '$selectedPista'
        AND inicio_reserva < '$selectedFecha $selectedHoraFin'
        AND fin_reserva > '$selectedFecha $selectedHoraInicio'
        AND estado_reserva NOT IN ('Cancelada', 'Completada')";


$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {
  $response = [
    'success' => false,
    'message' => 'Ya hay una reserva en el rango de horas seleccionado.'
  ];
} else {
  $response = [
    'success' => true,
    'message' => 'No hay reservas en el rango de horas seleccionado. Puedes proceder con la reserva.'
  ];
}

echo json_encode($response);

$mysqli->close();
