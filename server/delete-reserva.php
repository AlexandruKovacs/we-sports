<?php

$reservaId = $_GET['reservaId'];

require('../config/we_sports_connection.php');

$query = "DELETE FROM reservas WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $reservaId);
$stmt->execute();

if ($stmt->affected_rows === 0) {
  $stmt->close();
  $mysqli->close();
  header('Content-Type: application/json');
  echo json_encode(["error" => "No se pudo borrar la reserva"]);
  exit;
}

$stmt->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode(["success" => true]);
?>
