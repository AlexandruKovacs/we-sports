<?php

require('../config/we_sports_connection.php');

$idReserva = $_POST['idReserva'];

$updateEstado = "UPDATE reservas SET estado_reserva = 'Archivada' WHERE id = $idReserva";

if ($mysqli->query($updateEstado) === TRUE) {
    echo 'Se ha archivado la reserva correctamente';
} else {
    echo 'Error al archivar la reserva: ' . $mysqli->error;
}

$mysqli->close();

?>
