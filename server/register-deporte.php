<?php

session_start();

require('../config/we_sports_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $icono = $_POST['icono'];

    $sql_check = "SELECT COUNT(*) AS count FROM deportes WHERE nombre = '$nombre'";
    $result_check = $mysqli->query($sql_check);
    $row_check = $result_check->fetch_assoc();
    $count = $row_check['count'];

    if ($count > 0) {
        $response = array(
            'success' => false,
            'message' => 'El deporte ya existe'
        );
    } else {
        $sql_insert = "INSERT INTO deportes (nombre, icono) VALUES ('$nombre', '$icono')";

        if ($mysqli->query($sql_insert) === TRUE) {
            $response = array(
                'success' => true,
                'message' => 'Deporte añadido correctamente.'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error al insertar en la base de datos: ' . $mysqli->error
            );
        }
    }

    $mysqli->close();

    header('Content-Type: application/json');
    echo json_encode($response);
}
