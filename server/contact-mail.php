<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'wesportsoficial@gmail.com';
    $mail->Password = 'ylip awhg lspe rhnz';
    $mail->Port = 587;

    $mail->setFrom($email, $nombre);
    $mail->addAddress('wesportsoficial@gmail.com');

    $mail->Subject = 'Nuevo mensaje de contacto desde WeSports';
    $mail->isHTML(true);

    $imagen_clara = 'https://i.imgur.com/J8IghuR.png';

    $mail->Body = '
        <div style="background-color: #0a0c17; padding: 20px;">
            <div style="background-color: #111427; padding: 20px; border-radius: 5px;">
                <div style="text-align: center; margin-top: 20px;">
                    <img src="' . $imagen_clara . '" alt="Imagen de ejemplo" style="max-width: 300px;">
                </div>
                <h1 style="text-align: center; color: #fff; font-size: 24px;">Nuevo mensaje de contacto</h1>
                <p style="color: #fff; font-size: 16px;"><strong>Nombre:</strong> ' . $nombre . '</p>
                <p style="color: #fff; font-size: 16px;"><strong>Email:</strong> ' . $email . '</p>
                <p style="color: #fff; font-size: 16px;"><strong>Mensaje:</strong> ' . $mensaje . '</p>
            </div>
            <div style="text-align: center; color: #c3c3c3; font-size: 14px; margin-top: 20px;">
                <p>Este correo electrónico fue enviado desde el sitio web de WeSports. Por favor, no responda a este mensaje.</p>
                <p>Puede contactarnos a través de wesportsoficial@gmail.com para obtener más información.</p>
            </div>
        </div>';


    if ($mail->send()) {
        $response = [
            'success' => true,
            'message' => '<i class="fa-solid fa-check"></i>Correo enviado correctamente.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => '<i class="fa-solid fa-xmark"></i>Error al enviar el correo electrónico de confirmación: ' . $mail->ErrorInfo
        ];
    }

    echo json_encode($response);
}
