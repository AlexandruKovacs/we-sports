<?php

$administradorId = $_GET['administradorId'];

require('../config/we_sports_connection.php');

$query = "SELECT r.*, p.nombre AS nombre_pista, po.nombre AS nombre_polideportivo
            FROM reservas r
            INNER JOIN pistas p ON r.id_pista = p.id
            INNER JOIN polideportivos po ON p.id_polideportivo = po.id
            WHERE po.id_usuario = ?";

$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $administradorId);
$stmt->execute();

$result = $stmt->get_result();
$reservas = [];
while ($row = $result->fetch_assoc()) {
    $reservas[] = $row;
}

$stmt->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode($reservas);
