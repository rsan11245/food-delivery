<?php
include_once  dirname(__FILE__, 2) .  '/enums/Roles.php';
include_once  dirname(__FILE__, 2) .  '/models/User.php';
use app\enums\Roles;
use app\models\User;
class Auth {
    public function __construct()
    {

    }



    public function register($phone, $password): void
    {
        session_start();
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $res =  User::register($phone, $passwordHash);
        if (!$res) {
            //TODO обшибка бд
        } else {
            $user = User::findByPhone($phone);
            $_SESSION['user_id'] = $user->id;
        }
    }

    public function login($phone, $password)
    {
        session_start();

        $user = User::login($phone, $password);
        if (!$user) {
            //TODO обшибка бд
        } else {
            $_SESSION['user_id'] = $user->id;
        }
    }

    public static function checkAuth(): bool
    {
        session_start();
        return isset($_SESSION['user_id']);
    }

    public static function checkAdmin() : bool
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