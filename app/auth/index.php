<?php

include_once 'Auth.php';
include_once '../validation/UserValidation.php';
if (isset($_POST['registration'])) {
   registration();
} else if(isset($_POST['login'])) {
    login();
}
else {
    header('location: /auth/register.php');
}



function registration(): void
{
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $validationResponse = UserValidation::registration($phone, $password, $confirmPassword);
    if ($validationResponse['success']) {
        $auth = new Auth();

        if ($auth->register($phone, $password)) {
            echo json_encode(['location' => '/']);
        } else {
            echo json_encode(['errors' => ['message' => 'Не удалось зарегистрироваться']]);
        }
        echo json_encode(['location' => '/']);
    } else {
        echo json_encode(['errors' => $validationResponse['errors']]);
    }
}

function login() : void
{
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $validationResponse = UserValidation::login($phone, $password);
    if ($validationResponse['success']) {
        $auth = new Auth();

        if ($auth->login($phone, $password)) {
            echo json_encode(['location' => '/']);
        } else {
            echo json_encode(['errors' => ['message' => 'Не удалось войти']]);
        }

    } else {
        echo json_encode(['errors' => $validationResponse['errors']]);
    }

}



