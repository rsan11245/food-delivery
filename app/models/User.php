<?php

namespace app\models;
include '../db/config.php';

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

    public static function findById(int $id)
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
        $query->execute([$id]);
        $res = $query->fetch(\PDO::FETCH_ASSOC);
        if ($res) {
            return self::newInstance($res);
        }else{
            //TODO обшибка бд
        }
    }

    public static function findByPhone(string $phone)
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("SELECT * FROM `users` WHERE phone = ?");
        $query->execute([$phone]);
        $res = $query->fetch(\PDO::FETCH_ASSOC);
        if ($res) {
            return self::newInstance($res);
        }else{
            //TODO обшибка бд
        }

    }

    public static function register(string $phone, string $password)
    {
        $conn = $GLOBALS['conn'];
        $query = $conn->prepare("INSERT INTO `users`(`phone`, `password`) VALUES (?, ?)");

        return $query->execute([$phone, $password]);
    }

}