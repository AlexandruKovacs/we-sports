<?php

// InfinityFree
$db_host = 'sql113.infinityfree.com';
$db_user = 'if0_37014799';
$db_password = 'VGEWGJZFM1';
$db_name = 'if0_37014799_we_sports';

# Email


$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");
