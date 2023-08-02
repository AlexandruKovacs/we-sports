<?php

require('../config/we_sports_connection.php');

$idUser = $_POST['idUser'];

$sql = "SELECT * FROM polideportivos WHERE id_usuario = '$idUser'";
$result = $mysqli->query($sql);

$polideportivos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $polideportivo = array(
            'id' => $row['id'],
            'nombre' => $row['nombre']
        );
        $polideportivos[] = $polideportivo;
    }
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($polideportivos);
