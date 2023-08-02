<?php

require('../config/we_sports_connection.php');

$idReserva = $_POST['idReserva'];

$updateEstado = "UPDATE reservas SET estado_reserva = 'Cancelada' WHERE id = $idReserva";

if ($mysqli->query($updateEstado) === TRUE) {
    echo 'Se ha cancelado la reserva correctamente';
} else {
    echo 'Error al cancelar la reserva: ' . $mysqli->error;
}

$mysqli->close();

?>
