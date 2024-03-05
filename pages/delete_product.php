<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "FurStyle";

   $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
       die("Ошибка подключения: " . $conn->connect_error);
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["orderId"])) {
       $orderId = $_POST["orderId"];
       // Здесь выполните запрос на удаление заказа с указанным ID из базы данных
       $sql = "DELETE FROM Cart WHERE id = $orderId";
       if ($conn->query($sql) === TRUE) {
           echo "Заказ успешно удален";
       } else {
           echo "Ошибка удаления заказа: " . $conn->error;
       }
   }

   $conn->close();
   ?>