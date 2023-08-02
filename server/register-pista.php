<?php

$nombre = $_POST['nombre'];
$deporteId = $_POST['deporteId'];
$descripcion = $_POST['descripcion'];
$idUsuario = $_POST['idUsuario'];
$polideportivoId = $_POST['polideportivoId'];

require('../config/we_sports_connection.php');

$sql = "INSERT INTO pistas (nombre, id_deporte, descripcion, id_polideportivo) VALUES ('$nombre', $deporteId, '$descripcion', $polideportivoId)";

if ($mysqli->query($sql) === TRUE) {
    $response = [
        "success" => true,
        "message" => "La pista se añadió correctamente."
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Error al añadir la pista: " . $conn->error
    ];
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($response);
