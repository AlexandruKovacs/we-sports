<?php

require('../config/we_sports_connection.php');

$userId = $_GET['idUser'];

$query = "SELECT * FROM usuarios WHERE id = $userId";
$result = mysqli_query($mysqli, $query);

$response = array();

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $profileData = array(
        'nombre' => $row['nombre'],
        'apellidos' => $row['apellidos'],
        'email' => $row['email'],
        'username' => $row['username'],
        'telefono' => $row['telefono']
    );

    $response['success'] = true;
    $response['data'] = $profileData;
} else {
    $response['success'] = false;
    $response['message'] = 'No se encontraron datos de perfil para el usuario actual.';
}

header('Content-Type: application/json');
echo json_encode($response);

?>
