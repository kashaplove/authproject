<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login)>100)
{
    echo 'Недопустимая длина логина (от 5 до 100 символов)!';
    exit();
} elseif (mb_strlen($name) < 3 || mb_strlen($name) > 32)
{
    echo 'Недопустимая длина имени (от 3 до 32 символов)!';
    exit();
} elseif (mb_strlen($password) < 8 || mb_strlen($password) > 50)
{
    echo 'Недопустимая длина пароля (от 8 до 50 символов)!';
    exit();
}

$password = md5($password."jcorepmi2");

require '../configDB.php';
$sql = "INSERT INTO `users` (login, name, password) VALUES (:login, :name, :password)";
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'name' => $name, 'password' => $password]);

header('Location: /');