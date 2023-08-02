<?php

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendConfirmationEmail($name, $email, $token) {
    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'wesportsoficial@gmail.com';
        $mail->Password = 'ylip awhg lspe rhnz';

        $mail->setFrom('wesportsoficial@gmail.com', 'WeSports');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);

        $imagen_clara = 'https://i.imgur.com/J8IghuR.png';

        $mail->Subject = 'Confirma tu cuenta en WeSports';
        $mail->Body = '
        <div style="background-color: #0a0c17; padding: 20px;">
            <div style="background-color: #111427; padding: 20px; border-radius: 5px;">
                <div style="text-align: center; margin-top: 20px;">
                    <img src="' . $imagen_clara . '" alt="Imagen de ejemplo" style="max-width: 300px;">
                </div>
                <p style="color: #fff; font-size: 16px;">Estimado/a ' . $name . ',</p>
                <p style="color: #fff; font-size: 16px;">Gracias por registrarte en nuestro sitio web. Para confirmar tu cuenta, haz clic en el siguiente enlace:</p>
                <div style="text-align: center; margin-top: 50px; margin-bottom: 50px;">
                    <a href="https://we-sports-alexandru-kovacs.000webhostapp.com/confirm.php?token=' . $token . '" style="background-color: #16D5F8; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Confirmar cuenta</a>
                </div>
            </div>
            <div style="text-align: center; color: #c3c3c3; font-size: 14px; margin-top: 20px;">
                <p>Este correo electrónico fue enviado desde el sitio web de WeSports. Por favor, no responda a este mensaje.</p>
                <p>Puede contactarnos a través de wesportsoficial@gmail.com para obtener más información.</p>
            </div>
        </div>';
    

        $mail->send();
    } catch (Exception $e) {
        $response = [
            'success' => false,
            'message' => 'Error al enviar el correo electrónico de confirmación: ' . $mail->ErrorInfo
        ];
    }
}
