<?php

require('../config/we_sports_connection.php');

$sql = "SELECT * FROM deportes";
$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
  $deportes = [];

  while ($fila = $resultado->fetch_assoc()) {
    $deportes[] = $fila;
  }
} else {
  $deportes = [];
}

$JSONDeportes = json_encode($deportes);

header('Content-Type: application/json');
echo $JSONDeportes;
