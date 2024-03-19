<?php

namespace app\controllers;
include_once dirname(__FILE__, 2) . '/enums/Roles.php';
include_once dirname(__FILE__, 2) . '/models/User.php';
include_once dirname(__FILE__, 2) . '/validation/UserValidation.php';

use app\enums\Roles;
use app\models\User;
use app\validation\UserValidation;
use Symfony\Component\HttpFoundation\Response;

class AuthController
{
    public function __construct()
    {

    }


    public function register()
    {
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        $res = UserValidation::registration($phone, $password, $confirmPassword);
        if ($res['success']) {
            session_start();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $registerAttempt = User::register($phone, $passwordHash);
            if (!$registerAttempt) {
                $res['success'] = false;
                $res['errors']['message'] = 'Не удалось зарегистрироватся';
            } else {
                $user = User::findByPhone($phone);
                $_SESSION['user_id'] = $user->id;
                $res['location'] = '/';
            }
        }
        return json_encode($res);

    }

    public function login()
    {
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $res = UserValidation::login($phone, $password);
        if ($res['success']) {
            session_start();

            $user = User::login($phone, $password);
            if (!$user) {
                $res['success'] = false;
                $res['errors']['message'] = 'Не удалось войти';
            } else {
                $_SESSION['user_id'] = $user->id;

                if ($user->role === 1) {
                    $res['location'] = '/admin-panel';
                } else {
                    $res['location'] = '/';
                }

            }
        }
        return json_encode($res);

    }

    public static function checkAuth(): bool
    {
        session_start();
        return isset($_SESSION['user_id']);
    }

    public static function checkAdmin(): bool
    {
        $auth = self::checkAuth();
        if (!$auth) {
            return false;
        }
        $user = User::findById($_SESSION['user_id']);
        if ($user->role === Roles::Admin->value) {
            return true;
        } else {
            return false;
        }
    }

}