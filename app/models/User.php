<?php

namespace app\models;
include_once  dirname(__FILE__, 2) .  '/db/config.php';

class User
{
    public int $id;
    public string|null $firstName;
    public string|null $lastName;
    public string|null $email;
    public string $phone;
    public int $role;


//    public function __construct(int $id, string $firstName, string $lastName,
//                                string $email, string $phone, string $role)
//    {
//
//    }

    public static function newInstance(array $userArr) : User
    {
        $user = new User();
        $user->id = $userArr['id'];
        $user->firstName = $userArr['firstName'];
        $user->lastName = $userArr['lastName'];
        $user->email = $userArr['email'];
        $user->phone = $userArr['phone'];
        $user->role = $userArr['role_id'];
        return $user;
    }

    public static function findById(int $id): ?User
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
        $query->execute([$id]);
        $res = $query->fetch(\PDO::FETCH_ASSOC);
        if ($res) {
            return self::newInstance($res);
        }else{
            return null;
        }
    }

    public static function findByPhone(string $phone): ?User
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("SELECT * FROM `users` WHERE phone = ?");
        $query->execute([$phone]);
        $res = $query->fetch(\PDO::FETCH_ASSOC);
        if ($res) {
            return self::newInstance($res);
        }else{
            return null;
        }

    }

    public static function register(string $phone, string $password)
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("INSERT INTO `users`(`phone`, `password`) VALUES (?, ?)");

        return $query->execute([$phone, $password]);
    }

    public static function login($phone, $password)
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("SELECT * FROM `users` WHERE phone = ?");
        $query->execute([$phone]);
        $res = $query->fetch(\PDO::FETCH_ASSOC);
        if (!$res) {
            return false;
        }
        $checkPassword = password_verify($password, $res['password']);
        if (!$checkPassword) {
            return false;
        }
        return self::newInstance($res);
    }

}