<?php
session_start();
require("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $shopId = $_POST['shop_id'];
    $clientId = $_SESSION['id'];

    $sql = "INSERT INTO Orders (client_id, product_id, shop_id, quantity) VALUES ($clientId, $productId, $shopId, 1)";
    if ($conn->query($sql)) {
        echo "Заказ оформлен успешно!";
    } else {
        echo "Ошибка при оформлении заказа: " . $conn->error;
    }
    if($result = $conn->query($sql))
    {
        header("Location: profile.php");
    }
}
?>