<?php

session_start();

require('../config/we_sports_connection.php');
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$polideportivoId = $_POST['polideportivo_id'];
$polideportivoNombre = $_POST['polideportivo_nombre'];
$pistaId = $_POST['pista_id'];
$pistaNombre = $_POST['pista_nombre'];
$fecha = $_POST['fecha'];
$horaInicio = $_POST['hora_inicio'] . ':00';
$horaFin = $_POST['hora_fin'] . ':00';
$idUser = $_POST['id_user'];
$correoUser = $_SESSION['email'];
$nameUser = $_SESSION['nombre'];

$sqlReserva = "INSERT INTO `reservas` (`id_cliente`, `id_pista`, `inicio_reserva`, `fin_reserva`, `estado_reserva`, `fecha_creacion`) 
               VALUES ('$idUser', '$pistaId', '$fecha $horaInicio', '$fecha $horaFin', 'Activa', NOW())";

if ($mysqli->query($sqlReserva) === TRUE) {
    $idReserva = $mysqli->insert_id;

    $fechaPago = date('Y-m-d');
    $monto = 2.5 * ((strtotime($horaFin) - strtotime($horaInicio)) / (60 * 60));
    $numeroFactura = date('Ymd') . "-" . sprintf("%02d", $idReserva);

    $sqlPago = "INSERT INTO `pagos` (`id_reserva`, `fecha_pago`, `monto`, `numero_factura`) 
                VALUES ('$idReserva', '$fechaPago', '$monto', '$numeroFactura')";

    if ($mysqli->query($sqlPago) === TRUE) {

        $fechaFormateada = date('j M Y', strtotime($fecha));

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'wesportsoficial@gmail.com';
        $mail->Password = 'yxwg wnol owbd saan';

        $mail->setFrom('wesportsoficial@gmail.com', 'WeSports');
        $mail->addAddress($correoUser, $nameUser);

        $imagen_clara = 'https://i.imgur.com/J8IghuR.png';

        $mail->Subject = 'Resumen de reserva';
        $mail->Body = "<html>
        <head>
        <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #111427;
            border-radius: 5px;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #fff;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        
        table {
            width: 100%;
            color: #fff;
            border-collapse: collapse;
        }
        
        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        table th {
            padding: 10px;
            background-color: #0a0c17;
            border: 1px solid #ccc;
        }
        
        .message {
            text-align: center;
            color: #c3c3c3;
            font-size: 14px;
            margin-top: 20px;
        }
        
        </style>
        </head>
        <body>
        <div class='container'>
            <div style='text-align: center; margin-top: 20px;'>
                <img src=" . $imagen_clara . " alt='Imagen de ejemplo' style='max-width: 300px;'>
            </div>
            <h2>Resumen de reserva</h2>
            <p>Se ha realizado la reserva correctamente.</p>
            <table>
                <tr>
                    <th>Polideportivo</th>
                    <td>$polideportivoNombre</td>
                </tr>
                <tr>
                    <th>Pista</th>
                    <td>$pistaNombre</td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <td>$fechaFormateada</td>
                </tr>
                <tr>
                    <th>Hora de inicio</th>
                    <td>$horaInicio</td>
                </tr>
                <tr>
                    <th>Hora de fin</th>
                    <td>$horaFin</td>
                </tr>
            </table>
            <p>Gracias por confiar en nuestros servicios y por reservar con nosotros. Esperamos que disfrutes de tu tiempo en nuestras instalaciones deportivas.</p>
            <div class='message'>
                <p>Este correo electrónico fue enviado desde el sitio web de WeSports. Por favor, no responda a este mensaje.</p>
                <p>Puede contactarnos a través de wesportsoficial@gmail.com para obtener más información.</p>
            </div>
        </div>
        </body>
        </html>";
        
        $mail->IsHTML(true);


        if ($mail->send()) {
            $response = [
                'success' => true,
                'message' => '<i class="fa-solid fa-check"></i>Reserva realizada correctamente. Por favor, revisa tu correo electrónico para ver el resumen de la reserva.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => '<i class="fa-solid fa-circle-exclamation"></i>Error al enviar el correo electrónico: ' . $mail->ErrorInfo
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => '<i class="fa-solid fa-circle-exclamation"></i>Error al insertar en la tabla de pagos: ' . $mysqli->error
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => '<i class="fa-solid fa-circle-exclamation"></i>Error al insertar en la tabla de reservas: ' . $mysqli->error
    ];
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($response);
