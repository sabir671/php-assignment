<?php

$localhost = 'localhost';
$user = 'root';
$password = '';
$database = 'user';
$connection = mysqli_connect($localhost, $user,$password, $database);
if (!$connection) {
    die('database connection not established');
}
?>