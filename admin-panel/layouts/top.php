<?php

use app\controllers\AuthController;

include_once dirname(__FILE__, 3) . '\app\controllers/AuthController.php';

if (!AuthController::checkAdmin()) {
    header('location: /');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/admin-panel.css">
</head>
<body>


<div class="container">
    <div class="sidebar">
        <ul>
            <li>
                <a href="">
                    <span class="title"></span>
                </a>
            </li>
            <li>
                <a href="/admin-panel/users.php">
                    <i class="fa-sharp fa-solid fa-users"></i>
                    <span class="title">Users</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="top-bar">
            <div class="user">
                <img src="../../images/default_user.png" alt="">
            </div>
        </div>