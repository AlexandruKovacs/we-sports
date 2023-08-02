<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telefono = null;
    $tipoUsuario = $_POST['tipoUsuario'];

    $password = hash('sha512', $password);

    require('../config/we_sports_connection.php');
    require('send-email.php');

    $selectUsers = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($mysqli, $selectUsers);

    if (mysqli_num_rows($result) > 0) {
        $response = [
            'success' => false,
            'message' => '<i class="fa-solid fa-circle-exclamation"></i>El email ya está registrado, prueba con otro.',
            'exists' => true
        ];
    } else {

        $token = uniqid();

        $insertUser = "INSERT INTO usuarios (nombre, apellidos, email, username, password, telefono, tipo, confirmado, token) 
                VALUES 
                ('$name', '$surname', '$email', '$username', '$password', '$telefono', '$tipoUsuario', 0, '$token')";

        mysqli_query($mysqli, $insertUser);
        mysqli_close($mysqli);

        sendConfirmationEmail($name, $email, $token);

        $response = [
            'success' => true,
            'message' => '<i class="fa-solid fa-check"></i>¡Registro exitoso! Se ha enviado un correo electrónico de confirmación a tu dirección de correo electrónico.',
            'exists' => false
        ];
    }
    echo json_encode($response);
}
