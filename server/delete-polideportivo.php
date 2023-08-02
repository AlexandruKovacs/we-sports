<?php

$polideportivoId = $_GET['polideportivoId'];

require('../config/we_sports_connection.php');

$query = "DELETE FROM polideportivos WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $polideportivoId);
$stmt->execute();

if ($stmt->affected_rows === 0) {
  $stmt->close();
  $mysqli->close();
  header('Content-Type: application/json');
  echo json_encode(["error" => "No se pudo borrar el polideportivo"]);
  exit;
}

$stmt->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode(["success" => true]);
