<?php
    $product_id = $_POST['product_id'];
    session_start();
    require("connect.php");
    $sql = "DELETE FROM  Cart WHERE product_id = '$product_id'";
    if($result = $conn->query($sql))
    {
        $sql = "DELETE FROM Product WHERE id = '$product_id'";
        if($result = $conn->query($sql))
        {
            header("Location: ../pages/admin.php");
        }
    }
    
?>