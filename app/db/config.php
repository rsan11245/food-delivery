<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$db_name = 'mysql:host=localhost;dbname=mypizza';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

