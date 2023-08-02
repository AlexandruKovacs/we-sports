<?php
require('../config/we_sports_connection.php');

$idReserva = $_POST['idReserva'];

$selectReserva = "SELECT id FROM reservas WHERE id != $idReserva AND estado_reserva = 'Activa' AND inicio_reserva = (SELECT inicio_reserva FROM reservas WHERE id = $idReserva)";
$otraReservaResult = $mysqli->query($selectReserva);
$response = array();

if ($otraReservaResult->num_rows > 0) {
    $response['success'] = false;
    $response['message'] = 'Existe otra reserva nueva a la misma hora';
} else {
    $updateEstado = "UPDATE reservas SET estado_reserva = 'Activa' WHERE id = $idReserva";

    if ($mysqli->query($updateEstado) === TRUE) {
        $response['success'] = true;
        $response['message'] = 'Se ha reactivado la reserva correctamente';
    } else {
        $response['success'] = false;
        $response['message'] = 'Error al reactivar la reserva: ' . $mysqli->error;
    }
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
