<?php

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$horarioApertura = $_POST['horario_apertura'];
$horarioCierre = $_POST['horario_cierre'];
$ciudad = $_POST['ciudad'];
$provincia = $_POST['provincia'];
$pais = $_POST['pais'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$idUsuario = $_POST['id_usuario'];

require ('../config/we_sports_connection.php');

$sql = "INSERT INTO polideportivos (nombre, direccion, horario_apertura, horario_cierre, ciudad, provincia, pais, telefono, email, id_usuario) VALUES ('$nombre', '$direccion', '$horarioApertura', '$horarioCierre', '$ciudad', '$provincia', '$pais', '$telefono', '$email', '$idUsuario')";

if ($mysqli->query($sql) === TRUE) {
    $response = [
        "success" => true,
        "message" => "El polideportivo se añadió correctamente."
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Error al añadir el polideportivo: " . $mysqli->error
    ];
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($response);
