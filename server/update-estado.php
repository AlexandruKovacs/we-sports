<?php

require('../config/we_sports_connection.php');

$idReserva = $_POST['idReserva'];
$nuevoEstado = $_POST['nuevoEstado'];

$updateEstado = "UPDATE reservas SET estado_reserva = '$nuevoEstado' WHERE id = $idReserva";

if ($mysqli->query($updateEstado) === TRUE) {
    echo 'El estado de la reserva se ha actualizado correctamente';
} else {
    echo 'Error al actualizar el estado de la reserva: ' . $mysqli->error;
}

$mysqli->close();
