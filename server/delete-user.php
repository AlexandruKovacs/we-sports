<?php

$userId = $_GET['userId'];

require('../config/we_sports_connection.php');

// Obtener el ID del polideportivo asociado al usuario
$queryGetPolideportivoId = "SELECT id FROM polideportivos WHERE id_usuario = ?";
$stmtGetPolideportivoId = $mysqli->prepare($queryGetPolideportivoId);
$stmtGetPolideportivoId->bind_param('i', $userId);
$stmtGetPolideportivoId->execute();
$stmtGetPolideportivoId->bind_result($polideportivoId);
$stmtGetPolideportivoId->fetch();
$stmtGetPolideportivoId->close();

if ($polideportivoId) {
  // Eliminar las reservas asociadas a las pistas del polideportivo
  $queryDeleteReservas = "DELETE FROM reservas WHERE id_pista IN (SELECT id FROM pistas WHERE id_polideportivo = ?)";
  $stmtDeleteReservas = $mysqli->prepare($queryDeleteReservas);
  $stmtDeleteReservas->bind_param('i', $polideportivoId);
  $stmtDeleteReservas->execute();

  if ($stmtDeleteReservas->affected_rows === -1) {
    $stmtDeleteReservas->close();
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode(["error" => "No se pudieron borrar las reservas"]);
    exit;
  }

  $stmtDeleteReservas->close();

  // Eliminar las pistas asociadas al polideportivo
  $queryDeletePistas = "DELETE FROM pistas WHERE id_polideportivo = ?";
  $stmtDeletePistas = $mysqli->prepare($queryDeletePistas);
  $stmtDeletePistas->bind_param('i', $polideportivoId);
  $stmtDeletePistas->execute();

  if ($stmtDeletePistas->affected_rows === -1) {
    $stmtDeletePistas->close();
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode(["error" => "No se pudieron borrar las pistas"]);
    exit;
  }

  $stmtDeletePistas->close();
}

$queryDeletePolideportivos = "DELETE FROM polideportivos WHERE id_usuario = ?";
$stmtDeletePolideportivos = $mysqli->prepare($queryDeletePolideportivos);
$stmtDeletePolideportivos->bind_param('i', $userId);
$stmtDeletePolideportivos->execute();

if ($stmtDeletePolideportivos->affected_rows === -1) {
  $stmtDeletePolideportivos->close();
  $mysqli->close();
  header('Content-Type: application/json');
  echo json_encode(["error" => "No se pudieron borrar los registros de polideportivos"]);
  exit;
}

$stmtDeletePolideportivos->close();

$queryDeleteUsuario = "DELETE FROM usuarios WHERE id = ?";
$stmtDeleteUsuario = $mysqli->prepare($queryDeleteUsuario);
$stmtDeleteUsuario->bind_param('i', $userId);
$stmtDeleteUsuario->execute();

if ($stmtDeleteUsuario->affected_rows === 0) {
  $stmtDeleteUsuario->close();
  $mysqli->close();
  header('Content-Type: application/json');
  echo json_encode(["error" => "No se pudo borrar el usuario"]);
  exit;
}

$stmtDeleteUsuario->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode(["success" => true]);
