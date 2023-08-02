<?php

function confirmAccount($mysqli, $token) {
    $updateSql = "UPDATE usuarios SET confirmado = 1 WHERE token = '$token'";
    if ($mysqli->query($updateSql) === TRUE) {
        $response = '<div class="mensaje success" style="display: block;">
                        <i class="fa-solid fa-check"></i>
                        Cuenta confirmada exitosamente.
                    </div>
                    <button class="btn btn-login" id="loginUser">Iniciar sesión</button>';
    } else {
        $response = "Error al actualizar el campo 'confirmado': " . $mysqli->error;
    }

    $deleteSql = "UPDATE usuarios SET token = NULL WHERE token = '$token'";
    if ($mysqli->query($deleteSql) === TRUE) {
        $response = '<div class="mensaje success" style="display: block;">
                        <i class="fa-solid fa-check"></i>
                        Cuenta confirmada exitosamente.
                    </div>
                    <button class="btn btn-login" id="loginUser">Iniciar sesión</button>';
    } else {
        $response = "Error al eliminar el token: " . $mysqli->error;
    }

    return $response;
}
