<?php
$login = htmlspecialchars(trim($_POST['login']), ENT_QUOTES, 'UTF-8');
$pass = htmlspecialchars(trim($_POST['pass']), ENT_QUOTES, 'UTF-8');

$pass = md5($pass."sfesfgw2345");

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

$user = $result->fetch_assoc();
if(count($user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time()+ 3600,'/');


$mysql->close();

header('Location: ../index.html');

?>