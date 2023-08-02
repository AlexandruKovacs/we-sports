<?php

require('../config/we_sports_connection.php');

$sql = "SELECT * FROM usuarios";
$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
  $usuarios = [];

  while ($fila = $resultado->fetch_assoc()) {
    $usuarios[] = $fila;
  }
} else {
  $usuarios = [];
}

$JSONUsuarios = json_encode($usuarios);

header('Content-Type: application/json');
echo $JSONUsuarios;
