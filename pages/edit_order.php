<?php
// Подключение к базе данных

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FurStyle";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение параметров запроса
$orderId = $_POST['orderId'];
$newProductName = $_POST['newProductName'];
// Запрос на обновление данных заказа
$sql = "UPDATE Cart SET product_id = (SELECT id FROM Product WHERE Name = '$newProductName') WHERE id = $orderId";

if ($conn->query($sql)) {
    echo "Заказ успешно обновлен";
} else {
    echo "Ошибка при обновлении заказа: " . $conn->error;
}

$conn->close();
?>