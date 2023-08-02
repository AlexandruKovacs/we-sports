<?php

$config = parse_ini_file('C:\xampp\htdocs\DAW\WeSports\config\config.ini');
$db_host = $config['db_host'];
$db_user = $config['db_user'];
$db_password = $config['db_password'];
$db_name = $config['db_name'];

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");
