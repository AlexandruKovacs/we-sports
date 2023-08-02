<?php

session_start();

require('../config/we_sports_connection.php');

if (isset($_SESSION['email'])) {
    header('Location: ../menu-user.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = hash('sha512', $password);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['confirmado'] == 1) {
            $_SESSION["idUser"] = $row['id'];
            $_SESSION["nombre"] = $row['nombre'];
            $_SESSION["apellidos"] = $row['apellidos'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["password"] = $row['password'];
            $_SESSION["telefono"] = $row["telefono"];
            $_SESSION["tipo_usuario"] = $row["tipo"];

            $redirectUrls = [
                "cliente" => "user/menu-user.php",
                "admin_polideportivo" => "admin-poli/menu-poli.php",
                "admin" => "admin/usuarios-admin.php"
            ];

            if (array_key_exists($_SESSION["tipo_usuario"], $redirectUrls)) {
                $response = [
                    'success' => true,
                    'redirectUrl' => $redirectUrls[$_SESSION["tipo_usuario"]]
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => '<i class="fa-solid fa-circle-exclamation"></i>Acceso inválido. Por favor, inténtelo de nuevo.'
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => '<i class="fa-solid fa-circle-exclamation"></i>La cuenta no está confirmada. Por favor, verifique su correo electrónico.'
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => '<i class="fa-solid fa-circle-exclamation"></i>Acceso inválido. Por favor, inténtelo de nuevo.'
        ];
    }

    echo json_encode($response);
}
