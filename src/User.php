<?php

namespace Aleks\Devtask;

class User {
    public function registration($login, $password) {
        $mysql = new \Mysqli('localhost', 'root', 'root', 'tz');
        $query = "INSERT INTO `users`(`login`, `password`) VALUES ('$login', '$password')";
        return $mysql->query($query);
    }

    public function authorization($login, $password) {
        $mysql = new \Mysqli('localhost', 'root', 'root', 'tz');
        $query = "SELECT `login`, `password` FROM users WHERE `login` = '$login' LIMIT 1;";
        $user = $mysql->query($query)->fetch_assoc();
        if (isset($user['password']) && $user['password'] == $password) {
            $_SESSION['AUTH'] = true;
            return true;
        }
        return false;
    }
}