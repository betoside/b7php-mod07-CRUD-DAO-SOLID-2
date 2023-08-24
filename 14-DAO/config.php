<?php

$db_name = 'b7web_usuarios';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
