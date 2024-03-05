<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <?php require("../php/header.php"); ?><br><br><br><br><br><br><br><br><br>
    <form action="catalog.php" method="GET" class="search">
        <input type="text" name="product_name" placeholder="Найти">
        <select name="filter">
            <option value="0">Не сортировать</option>
            <option value="1">Дешевле</option>
            <option value="2">Дорорже</option>
        </select>
        <input type="submit" value="Сортировать">
    </form>
    <div class="product-list">
    <?php
    
            require("../php/connect.php");
            $sql = "SELECT * FROM Product";
            
            if(isset($_GET['product_name']) && $_GET['product_name'] != "")
            {
                $sql = $sql." WHERE name LIKE '%".$_GET['product_name']."%'";
            }
            if(isset($_GET['filter']) && $_GET['filter'] == 1) {
                $sql = "SELECT * FROM Product ORDER BY price";
            }
            if(isset($_GET['filter']) && $_GET['filter'] == 2)
            {
                $sql = "SELECT * FROM Product ORDER BY price DESC";
            }

            if($result = $conn->query($sql))
            {
                foreach ($result as $row) {
                    
                    echo "<div class='product-item'>";
                    echo "<form action='../php/addProduct.php' method='post'>";
                    echo "<img class='product-img' src='".''.$row['image_path']."'/>";
                    echo "<p class='product-title'>".$row['name']."</p>";
                    echo "<p class='product-price'>".$row['price'].'₽'."</p>";
                    echo "<input type='text' hidden value='".$row['id']."'  name='product_id'/>";
                    if(isset($_SESSION['isLoggined']))
                    {
                        echo "<input class='add' type='submit' value='Добавить' />";
                  
                    }
                    
                    
                    echo "</form>";
                    
                    echo "</div>";
                    
                }
            }
        ?>
        
</body>
</html>