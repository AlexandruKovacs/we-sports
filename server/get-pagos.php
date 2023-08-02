<?php

require('../config/we_sports_connection.php');

$userId = $_GET['userId'];

$sql = "SELECT p.*
    FROM pagos p
        INNER JOIN reservas r ON p.id_reserva = r.id
        INNER JOIN pistas pi ON r.id_pista = pi.id
        INNER JOIN polideportivos po ON pi.id_polideportivo = po.id
        INNER JOIN usuarios u ON po.id_usuario = u.id
    WHERE u.tipo = 'admin_polideportivo' AND u.id = '$userId';";

$result = $mysqli->query($sql);

$pagos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pagos[] = $row;
    }
}

$mysqli->close();

$JSONPagos = json_encode($pagos);
echo $JSONPagos;
