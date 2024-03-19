<?php
namespace app\controllers;

use app\models\User;

class AdminController
{
    public static function index(): array
    {
        $users_count = count(User::all());
        return [
            'users_count' =>$users_count,
        ];
    }

    public function test()
    {
        $a = 2;
    }
}