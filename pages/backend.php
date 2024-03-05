<?php
// Установка подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FurStyle";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение всех заказов из базы данных
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

// Отображение таблицы со всеми заказами
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Данные</th><th>Действия</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["data"] . "</td>";
        echo "<td><button onclick=\"editOrder(" . $row["id"] . ")\">Редактировать</button></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Нет доступных заказов.";
}

// Закрытие соединения с базой данных
$conn->close();
?>