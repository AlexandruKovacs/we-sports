<?php

require('../config/we_sports_connection.php');

$pagoId = $_GET['pagoId'];

$sql = "DELETE FROM pagos WHERE id = '$pagoId'";
$result = $mysqli->query($sql);

if ($result) {
  echo "Pago eliminado correctamente";
} else {
  echo "Error al eliminar el pago";
}

$mysqli->close();

?>
