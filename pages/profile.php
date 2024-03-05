<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
}

h1 {
  color: #333;
  text-align: center;
  margin-top: 20px;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
}

#avatarPreview {
  width: 200px;
  height: 200px;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  margin-bottom: 20px;
}

input[type="file"] {
  display: none;
}

label {
  padding: 10px 20px;
  background-color: #4287f5;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

label:hover {
  background-color: #0a60b3;
}

#saveAvatarButton {
  padding: 10px 20px;
  background-color: #55c926;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

#saveAvatarButton:hover {
  background-color: #389119;
}
</style>
<style>
/* Стили для модального окна */
.change_conteiner {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.change_conteiner input[type="text"],
.change_conteiner input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
}

.change_conteiner input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
}

.change_conteiner input[type="submit"]:hover {
  background-color: #45a049;
}

.change_conteiner .close {
  position: absolute;
  top: 5px;
  right: 5px;
  cursor: pointer;
  font-size: 20px;
  color: #aaa;
}

/* Стили для кнопок "Изменить" */
.show_change {
  background-color: transparent;
  border: none;
  color: #4CAF50;
  font-size: 14px;
  cursor: pointer;
  transition: color 0.3s;
}

.show_change:hover {
  color: #45a049;
}
</style>
    <title>Профиль пользователя</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../css/product.css">
</head>
<?php require("../php/header.php"); ?><br><br><br><br><br><br><br><br><br>
<body>
    <h1>Мой профиль</h1>
    <form id="avatarForm">
    <?php
    session_start();
            require("../php/connect.php");
            $userId = $_SESSION["id"];
    $sql = "SELECT balance FROM Client WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentBalance = $row['balance'];
    
    echo "Текущий баланс: " . $currentBalance;
    } else {
    echo "Пользователь с данным ID не найден.";
    }
            ?>
        <H1>Ваши Заказы</H1>
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
    WHERE client_id = " . $_SESSION['id'];

$shops = $conn->query("SELECT * FROM Shops");

if ($result = $conn->query($sql)) {
    foreach ($result as $row) {
        echo "<div class='product-item'>";
        echo "<img class='product-img' src='" . $row['image_path'] . "'/>";
        echo "<p class='product-title'>" . $row['name'] . "</p>";
        echo "<p class='product-price'>" . $row['price'] . '₽' . "</p>";
        echo "<p class='product-price'>" . $row['cod'] . ' Ваш Уникальный номер билета' . "</p>";
        echo "Отправленно на сборку <br>";
        echo "<form action='submitOrder.php' method='post'>";
        echo "<select name='shop_id'>";
        foreach($shops as $shop) {
            echo "<option value='".$shop['id']."'>".$shop['name']."</option>";
        }
        echo "</select>";
        
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "' />";
        echo "<input type='submit' class='order' value='Оформить' />";
        echo "</form>";
        
        echo "</div>";
    }
}
?>
    </form>
    </div>
    <footer class="footer">
    
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
    <li class="menu__item"><a class="menu__link" href="index.php">Главная</a></li>
      <li class="menu__item"><a class="menu__link" href="pages/times.php">Каталог</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Отзывы</a></li>
      <li class="menu__item"><a class="menu__link" href="pages/comand.php">О команде</a></li>
      <li class="menu__item"><a class="menu__link" href="pages/profile.php">Профиль</a></li>

    </ul>
    <p>&copy;2023 ВЛАДТОМАШ | All Rights Reserved</p>
  </footer>
    <script src="profile.js"></script>
</body>
</html>