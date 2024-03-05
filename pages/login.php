<!DOCTYPE html>
<link rel="stylesheet" href="../css/logstyle.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <form action="../php/login.php" method="post">
        <input type="email" name="email" placeholder="Почта">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
        <a href="register.php">Создать аккаунт</a>
    </form>
</body>
</html>