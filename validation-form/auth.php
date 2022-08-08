<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password = md5($password."jcorepmi2");
require '../configDB.php';

$sql = "SELECT * FROM `users` WHERE `login` = :login AND `password`=:password";
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'password' => $password]);
$user = $query->fetch(PDO::FETCH_ASSOC);
if (!$user)
{
    echo 'Неверный логин или пароль!';
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");


header('Location: /');