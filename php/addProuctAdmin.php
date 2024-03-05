<?php

    require("connect.php");
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_path = $_POST['image_path'];
    $sql = "INSERT INTO Product (name, price, image_path, Seans) Values ('$name', $price, '$image_path',0);";

    if($result = $conn->query($sql))
    {
        header("Location: #");
    }
?>