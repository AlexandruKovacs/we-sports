<?php

$pistaId = $_GET['pistaId'];

echo $pistaId;

require('../config/we_sports_connection.php');

$query = "DELETE FROM pistas WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $pistaId);
$stmt->execute();

if ($stmt->affected_rows === 0) {
  $stmt->close();
  $mysqli->close();
  header('Content-Type: application/json');
  echo json_encode(["error" => "No se pudo borrar la pista"]);
  exit;
}

$stmt->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode(["success" => true]);
