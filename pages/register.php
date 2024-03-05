<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/logstyle.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/form.css">
    <script src="../js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
</head>
<body>
    <form action="../php/register.php" method="post">
    <input placeholder="Имя" type="text" name="firstName">
    <input placeholder="Фамилия" type="text" name="lastName">
    <input placeholder="Почта" type="email" name="email">
    <input id="phone" placeholder="Телефон" type="phone" name="phone">
    <input placeholder="Пароль" type="password" name="password">
    <input type="submit" value="Регистрация">
    <a href="login.php">Войти</a>
    </form>
    <script src="../js/mask.js"></script>
</body>
</html>