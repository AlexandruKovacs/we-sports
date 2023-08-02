<?php

require('../config/we_sports_connection.php');

$sql = "SELECT *, p.id AS id_pista, p.nombre AS nombre_pista, d.nombre AS nombre_deporte, po.nombre AS nombre_polideportivo
        FROM pistas p
        INNER JOIN deportes d ON p.id_deporte = d.id
        INNER JOIN polideportivos po ON p.id_polideportivo = po.id";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pistas[] = $row;
    }
} else {
    $pistas = [];
}
$mysqli->close();

$JSONPistas = json_encode($pistas);
echo $JSONPistas;
