<!DOCTYPE html>
<html lang="en">
<style>
.content {
  text-align: center;
  margin-top: 50px;
}

.product-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.product {
  width: 200px;
  margin: 20px;
}

.product-image {
  width: 100%;
  height: auto;
  margin-bottom: 10px;
}

.product-title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 5px;
}

.product-price {
  font-size: 16px;
  margin-bottom: 10px;
}

.product-form {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    .content {
        text-align: center;
        margin-top: 50px;
    }

    .more {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
    }

    .comment-list {
        margin-top: 20px;
    }

    .comment-text {
        margin-bottom: 10px;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        padding: 10px;
    }
</style>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт сделал влад томашевский</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
<header class="header">
<div class="otstup">
  <div class="logo-headar">
    <img href="index.php" src=""   id="logo-headar" ><br><br>
    <h1>Стеклянный мастер</h1>
  </div>
  <div class="menu">
	   <a href="index.php" class="underline-one weg">Главная </a>
  </div>
<div class="menu">
<p> <a href="pages/catalog.php"  class="underline-one weg" style="color: black;">Каталог</a> </p>
</div>
<div class="menu">
<p> <a href="pages/deposit.php"  class="underline-one weg" style="color: black;">Пополнить баланс</a> </p>
</div>
<div class="menu">
<p> <a href="pages/register.php"  class="underline-one weg" style="color: black;">Регистрация </a> </p>
</div>


            <?php 
                session_start();
                if(isset($_SESSION['isLoggined']))
                {
                    echo '<div class="menu">
                    <p> <a href="pages/profile.php"  class="underline-one weg" style="color: black;">Профиль</a> </p>
                    </div>';
                    echo '<div class="menu">
                    <p> <a href="php/exit.php"  class="underline-one weg" style="color: black;">Выйти</a> </p>
                    </div>';
                }
                else 
                {
                    echo '<div class="menu">
                    <p> <a href="pages/login.php"  class="underline-one weg" style="color: black;">Войти</a> </p>
                    </div>';
                }
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
                {
                    echo "<a href='pages/admin.php'>Администрация</a>";
                }
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 2)
                {
                    echo "<a href='pages/menage.php'>Меню Сотрудника</a>";
                }

                
            ?>

        </nav>
    </header> <br><br><br><br><br><br><br><br><br><br>
    <div class="content">
    <h1>НАШИ ТОВАРЫ</h1>
        <?php
            require("php/connect.php");
            $sql = "SELECT * FROM Product ORDER BY rand() LIMIT 5;";

            if($result = $conn->query($sql))
            {
                echo "<div class='product-container'>";
                foreach ($result as $row) {
                    echo "<form action='php/addProduct.php' method='post'>";
                    echo "<div class='product'>";
                    echo "<img class='product-image' src='".$row['image_path']."'/>";
                    echo "<p class='product-title'>".$row['name']."</p>";
                    echo "<p class='product-price'>".$row['price'].'₽'."</p>";
                    if(isset($_SESSION['isLoggined']))
                    {
                    }
                    echo "</div>";
                    echo "</form>";
                }
                echo "</div>";
            }
        ?>
        <a href="pages/catalog.php" class="more">Каталог</a>
        <?php
            require("php/connect.php");
            $sql = "SELECT * FROM Comments ORDER BY rand() LIMIT 3;";

            if($result = $conn->query($sql))
            {
                echo "<div class='comment-list'>";
                foreach ($result as $row) {
                    echo "<p class='comment-text'>".$row['text']."</p>";
                }
                echo "</div>";
            }
        ?>
    </div><br><br><br><br><br><br><br><br><br><br><br><br>

    
    <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
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

 
</body>
</html>



