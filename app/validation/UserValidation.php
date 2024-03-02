<?php
include '../models/User.php';
use app\models\User;

class UserValidation {
    public static function registration($phone, $password, $confirmPassword) : array {
        $res = ['success' => true, 'errors' => []];

        if (strlen($phone) < 10 || strlen($phone) > 100) {
            $res['success'] = false;
            $res['errors']['phone'] = 'Телефон заполнен неверно';
        }
        if (strlen($password) < 4) {
            $res['success'] = false;
            $res['errors']['password'] = 'Пароль слишком короткий';
        }
        if (strlen($password) > 100) {
            $res['success'] = false;
            $res['errors']['password'] = 'Пароль слишком длинный';
        }
        if (!$res['success']) {
            return $res;
        }

        if (User::findByPhone($phone)) {
            $res['success'] = false;
            $res['errors']['message'] = 'Пользователь с таким телефоном уже существует';
            return $res;
        }

        if ($password !== $confirmPassword) {
            $res['success'] = false;
            $res['errors']['password'] = 'Пароли не совпадают';
            $res['errors']['confirm_password'] = 'Пароли не совпадают';
            return $res;
        }

        return $res;
    }
}