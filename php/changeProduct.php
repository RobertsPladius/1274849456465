<?php
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    session_start();
    require("connect.php");

    $sql = "UPDATE Product
    SET name = '$name', price = '$price'
    Where id = $product_id";
    
    if($result = $conn->query($sql))
    {
        header("Location: ../pages/admin.php");
    }
?>