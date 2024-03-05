<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FurStyle";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, была ли отправлена форма для пополнения баланса
if(isset($_POST['submit'])) {
    $amount = $_POST['amount'];

    // Проверка, что введенное значение не является отрицательным
    if($amount > 0) {
        // Получение текущего баланса пользователя из базы данных
        
        $userId = $_SESSION["id"];
        $sql = "SELECT balance FROM Client WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentBalance = $row['balance'];
            
            // Прибавление суммы к текущему балансу
            $newBalance = $currentBalance + $amount;

            // Обновление баланса в базе данных
            $updateSql = "UPDATE Client SET balance = $newBalance WHERE id = $userId";
            if ($conn->query($updateSql) === TRUE) {
                echo "Баланс успешно обновлен!";
            } else {
                echo "Ошибка обновления баланса: " . $conn->error;
            }
        } else {
            echo "Пользователь с данным ID не найден.";
        }
    } else {
        echo "Введите положительное значение для пополнения баланса.";
    }
}

// Получение текущего баланса пользователя из базы данных
$userId = $_SESSION["id"];
$sql = "SELECT balance FROM Client WHERE id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentBalance = $row['balance'];
    
    echo "Текущий баланс: " . $currentBalance;
} else {
    echo "Пользователь с данным ID не найден.";
}

// Закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Пополнение баланса</title>
</head>
<body>
    <h1>Пополнение баланса</h1>
    <form method="post" action="">
        <label for="amount">Сумма для пополнения:</label>
        <input type="number" name="amount" id="amount" required>
        <input type="submit" name="submit" value="Пополнить">
    </form>
</body>
</html>