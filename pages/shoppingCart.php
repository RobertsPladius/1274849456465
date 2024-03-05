<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/product.css">
    <title>Корзина</title>
</head>
<body>
    <?php require("../php/header.php");?><br><br><br><br><br><br><br><br><br><br><br>
    <div class="makeOrder">
        <?php
            require("../php/connect.php");
            $sql = 'SELECT SUM(price) as total from Cart 
            INNER join Product on Cart.product_id = Product.id WHERE client_id = '.$_SESSION['id'];

            if($result = $conn->query($sql))
            {
                foreach ($result as $row) {
                    echo "<p>Итог: ".$row['total']."</p>";
                }
            }
            
        ?>
        <button type="submit">Оформить</button>
    </div>
    <div class="product-list">
    <?php
            session_start();
            require("../php/connect.php");
            $sql = "SELECT * FROM Cart
                INNER JOIN Product ON Cart.product_id = Product.id
                WHERE client_id = ".$_SESSION['id'];

            if($result = $conn->query($sql))
            {
                foreach ($result as $row) {
                    echo "<form action='../php/deleteProduct.php' method='post'>";
                    echo "<div class='product-item'>";
                    echo "<img class='product-img' src='".'../'.$row['image_path']."'/>";
                    echo "<p class='product-title'>".$row['name']."</p>";
                    echo "<p class='product-price'>".$row['price'].'₽'."</p>";
                    echo "<input type='text' hidden value='".$row['id']."'  name='product_id'/>";
                    echo "<input type='submit' class='delete' value='Удалить' />";
                    
                    echo "</div>";
                    echo "</form>";
                }
            }
        ?>
    </div>
</body>
</html>