<?php
    $product_id = $_POST['product_id'];
    $mesto = $_POST['mesto'];
    $cod =  rand(10000000, 99999999);
    session_start();
    require("connect.php");
    $sql = "Insert Into Cart (client_id, product_id, Mesto1, cod) Values ('".$_SESSION['id']."', '$product_id','$mesto', $cod)";
    if($result = $conn->query($sql))
    {
        header("Location: ../pages/catalog.php");
    }
?>