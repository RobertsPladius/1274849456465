<header class="header">
<link rel="stylesheet" href="../style.css">
<div class="otstup">
  <div class="logo-headar">
    <img href="index.php" src=""   id="logo-headar" ><br><br>
    <h1>Стеклянный мастер</h1>
  </div>
  <div class="menu">
	   <a href="../index.php" class="underline-one weg">Главная</a>
  </div>
<div class="menu">
      <a href="../pages/profile.php" class="underline-one weg">Профиль</a>
  </div>
<div class="menu">
<p> <a href="../pages/catalog.php"  class="underline-one weg" style="color: black;">Каталог</a> </p>
</div>

<div class="menu">
<p> <a href="../pages/deposit.php"  class="underline-one weg" style="color: black;">Пополнить баланс</a> </p>
</div>
            <?php 
                session_start();
                if(isset($_SESSION['isLoggined']))
                {
                    echo '<div class="menu">
                    <p> <a href="../pages/profile.php"  class="underline-one weg" style="color: black;">Профиль</a> </p>
                    </div>';
                    echo '<div class="menu">
                    <p> <a href="../php/exit.php"  class="underline-one weg" style="color: black;">Выйти</a> </p>
                    </div>';
                    echo '<div class="menu">
                    <p> <a href="../pages/register.php"  class="underline-one weg" style="color: black;">Регистрация</a> </p>
                    </div>';
                }
                else 
                {
                    '<div class="menu">
                    <p> <a href="../pages/login.php"  class="underline-one weg" style="color: black;">Войти</a> </p>
                    </div>';
                }
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
                {
                    echo "<a href='../pages/admin.php'>Администрация</a>";
                }
            ?>
        </nav>
    </header>