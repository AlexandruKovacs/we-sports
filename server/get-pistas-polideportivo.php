<?php

$polideportivoId = $_POST['polideportivo_id'];

require('../config/we_sports_connection.php');

$sql = "SELECT p.*, d.icono FROM pistas AS p
        INNER JOIN deportes AS d ON p.id_deporte = d.id
        WHERE p.id_polideportivo = $polideportivoId";


$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $pistas = array();

    while ($row = $result->fetch_assoc()) {
        $pistas[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($pistas);
} else {

    header('Content-Type: application/json');
    echo json_encode([]);
}

$mysqli->close();

?>
