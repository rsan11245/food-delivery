<?php
include 'Auth.php';
include '../validation/UserValidation.php';
if (isset($_POST['registration'])) {
   registration();
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



