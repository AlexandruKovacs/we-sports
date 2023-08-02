<?php

require('./config/we_sports_connection.php');

$fechaHoraActual = date('Y-m-d H:i:s');

$sql = "UPDATE reservas SET estado_reserva = 'Completada' 
    WHERE fin_reserva < '$fechaHoraActual' 
    AND estado_reserva = 'Activa'";

$result = $mysqli->query($sql);