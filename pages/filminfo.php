<!DOCTYPE html>
<html>
<head>

    <title>Профиль пользователя</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../css/product1.css">
</head>
<?php require("../php/header.php"); ?><br><br><br><br><br><br><br><br><br>
<?php
    require("../php/connect.php");
    $sql = "SELECT * FROM infoFilm";
    if($result = $conn->query($sql))
    {
        foreach ($result as $row) {
            
            echo "<div class='product-item'>";
            echo "<form action='../php/deleteProductAdmin.php' method='post'>";
            echo "<img class='product-img' src='".'../'.$row['image_path']."'/>";
            echo "<p class='product-title'>".$row['name']."</p>";
            echo "<p class='product-price'>".$row['infoText']."</p>";
            echo "<input type='text' hidden value='".$row['id']."' name='product_id'/>";
            echo "</form>";
            
        }
    }
?> </div> </div>
    </div><br><br><br><br><br><br><br><br><br>
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