<?php
header("Access-Control-Allow-Origin: *");

$db_host = '';
$db_user = '';
$db_password = '';
$db_database = '';

$connect = mysqli_connect($db_host, $db_user, $db_password, $db_database);

