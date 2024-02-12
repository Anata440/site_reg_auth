<?php
$login = htmlspecialchars(trim($_POST['login']), ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
$pass = htmlspecialchars(trim($_POST['pass']), ENT_QUOTES, 'UTF-8');

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
}
else if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
    exit();
}
else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 16) {
    echo "Недопустимая длина пароля (от 2 до 16 символов)";
    exit();
}
$pass = md5($pass."sfesfgw2345");


$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$mysql->query("INSERT INTO `users` (`login` , `name`, `pass`) VALUES ('$login', '$name', '$pass')") ;

$mysql->close();

header('Location: ../index.html');

?>
