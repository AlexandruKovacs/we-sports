<?php

session_start();

require('../config/we_sports_connection.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['idUser'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $telefono = $_POST['telefono'];
    
    $query = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', username = '$username', telefono = '$telefono' WHERE id = $userId";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        $response['success'] = true;
        $response['message'] = 'Datos de perfil actualizados correctamente.';

        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellidos'] = $apellidos;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['telefono'] = $telefono;
    } else {
        $response['success'] = false;
        $response['message'] = 'Error al actualizar los datos de perfil.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Método no permitido.';
}

header('Content-Type: application/json');
echo json_encode($response);
