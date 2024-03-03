<?php
include_once 'Auth.php';
include_once '../validation/UserValidation.php';
if (isset($_POST['registration'])) {
   registration();
} else if(isset($_POST['login'])) {
    login();
}
else {
    header('location: /pages/auth/register.php');
}



function registration(): void
{
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $validationResponse = UserValidation::registration($phone, $password, $confirmPassword);
    if ($validationResponse['success']) {
        $auth = new Auth();
        $auth->register($phone, $password);
    } else {
        //TODO вернуть $validationResponse
    }
    header('location: /');
}

function login()
{
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $validationResponse = UserValidation::login($phone, $password);
    if ($validationResponse['success']) {
        $auth = new Auth();
        $auth->login($phone, $password);
    } else {
        //TODO вернуть $validationResponse
    }
    header('location: /');
}



