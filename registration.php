<?php
include './vendor/autoload.php';
session_start();

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (empty($login) || empty($password)) {
        $error = "Не введен логин или пароль";
    } else {
        $user = new \Aleks\Devtask\User();
        if (!$user->registration($login, $password)) {
            $error = "Не удалось зарегистрироваться";
        } else {
            header('Location: http://devtask/auth.php');
        }
    }
}
if (isset($_SESSION['AUTH']) && $_SESSION['AUTH']) {
    header('Location: http://devtask/index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<?php
if (isset($error)) {
    echo $error;
}
?>
<h1>Регистрация</h1>
<form action="/registration.php" method="post">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="submit" value="Войти">
</form>
</body>
</html>
