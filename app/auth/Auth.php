<?php

use app\models\User;
class Auth {
    public function __construct()
    {

    }

    public function register($phone, $password)
    {
        session_start();
        $res =  User::register($phone, $password);
        if (!$res) {
            //TODO обшибка бд
        }
        $user = User::findByPhone($phone);
        $_SESSION['user_id'] = $user->id;
    }
}