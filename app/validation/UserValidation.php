<?php
namespace app\validation;

include_once dirname(__FILE__, 2) . '/models/User.php';

use app\models\User;

class UserValidation
{
    public static function registration($phone, $password, $confirmPassword): array
    {
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
            $res['errors']['phone'] = 'Пользователь с таким телефоном уже существует';
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

    public static function login($phone, $password): array
    {
        $res = ['success' => true, 'errors' => []];

//        if (!preg_match('^((8|\\+7)[\\- ]?)?(\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}$', $phone)) {
//            $res['success'] = false;
//            $res['errors']['phone'] = 'Телефон заполнен неверно';
//        }
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
        if (!User::findByPhone($phone)) {
            $res['success'] = false;
            $res['errors']['phone'] = 'Пользователь с таким телефоном не существует';
            return $res;
        }
        return $res;
    }
}