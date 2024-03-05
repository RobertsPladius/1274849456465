<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .order-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .order-id {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .order-client {
            font-style: italic;
            margin-bottom: 10px;
        }

        .order-product {
            margin-bottom: 20px;
        }

        .edit-button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }

        .edit-form {
            display: none;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
        }

        .edit-form h2 {
            margin-bottom: 20px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 10px;
        }

        .edit-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .edit-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрация</title>
    <link rel="stylesheet" href="../css/product.css">
    <script src="../js/code.jquery.com_jquery-3.7.1.min.js"></script>
</head>
<body>










</div>
<div class="change_conteiner" style="display: none;">
    <form action="../php/changeProduct.php" method="post">
        <p class="close"><b>X</b></p>
        <input type="text" name="name" placeholder="Название">
        <input type="text" name="price" placeholder="Цена">
        <input type="text" hidden name="product_id" class="change_product_id">
        <input type="submit" value="Изменить">
    </form>
</div>

<script>
    // Получаем все кнопки "Изменить"
    var changeButtons = document.getElementsByClassName("show_change");

    // Получаем контейнер модального окна
    var modalContainer = document.getElementsByClassName("change_conteiner")[0];

    // Получаем кнопку "Закрыть" в модальном окне
    var closeButton = modalContainer.getElementsByClassName("close")[0];

    // Получаем поле продукта в модальном окне
    var productField = modalContainer.getElementsByClassName("change_product_id")[0];

    // Добавляем обработчик события "клик" на каждую кнопку "Изменить"
    for (var i = 0; i < changeButtons.length; i++) {
        changeButtons[i].addEventListener("click", function(e) {
            var productId = e.target.id; // Получаем id продукта

            // Заполняем поле продукта в модальном окне
            productField.value = productId;

            // Отображаем модальное окно
            modalContainer.style.display = "block";
        });
    }

    // Добавляем обработчик события "клик" на кнопку "Закрыть" в модальном окне
    closeButton.addEventListener("click", function() {
        // Скрываем модальное окно
        modalContainer.style.display = "none";
    });
</script>















<?php

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FurStyle";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Запрос на получение заказов всех пользователей с информацией о столбце "cod"
$sql = "SELECT Cart.id, Client.firstName, Client.lastName, Name, Cart.cod
            FROM Cart
            INNER JOIN Client ON Cart.client_id = Client.id
            INNER JOIN Product ON Cart.product_id = Product.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Выводим заказы всех пользователей
    while ($row = $result->fetch_assoc()) {
        echo '<div class="order-container">';
        echo '<div class="order-id">ID заказа: ' . $row["id"] . '</div>';
        echo '<div class="order-client">Имя клиента: ' . $row["firstName"] . ' ' . $row["lastName"] . '</div>';
        echo '<div class="order-product">Продукт: ' . $row["Name"] . '</div>';
        echo '<div class="order-cod">Код: ' . $row["cod"] . '</div>'; 
        echo "Ожидает подтверждения <br>";
        echo '<button class="edit-button" onclick="openEditForm(' . $row["id"] . ')">Редактировать</button>';
        echo "<br><br>";
        echo '<button class="edit-button" onclick="deleteOrder(' . $row["id"] . ')">Закрыть заказ</button>';
        echo '</div>';
    }
}
$conn->close();
?>
<script>
    function deleteOrder(orderId) {
       if (confirm("Вы уверены, что хотите удалить этот заказ?")) {
           // Отправка запроса на удаление товара на сервер
           var xhr = new XMLHttpRequest();
           xhr.open("POST", "delete_product.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xhr.onreadystatechange = function() {
               if (xhr.readyState === 4 && xhr.status === 200) {
                   // Обработка ответа, если необходимо
               }
           };
           xhr.send("orderId=" + orderId);
       }
   }
</script>

<!-- Окно для редактирования и удаления заказа -->
<div id="editForm" class="edit-form" style="display: none;">
    <h2>Редактирование заказа</h2>
    <form action="edit_order.php" method="POST">
        <input type="hidden" id="orderId" name="orderId">
        <!-- Здесь добавьте поля для редактирования заказа, например: -->
        <label for="newProductName">Новое название продукта:</label>
        <input type="text" id="newProductName" name="newProductName">
        <br>
        <input type="submit" value="Сохранить изменения">
    </form>
    <button class="delete-button" onclick="deleteOrderConfirmation()">Удалить заказ</button>
</div>

<script>
    function openEditForm(orderId) {
        var editForm = document.getElementById("editForm");
        var orderIdInput = document.getElementById("orderId");
        orderIdInput.value = orderId;
        editForm.style.display = "block";
    }

    function deleteOrderConfirmation() {
        if (confirm("Вы уверены, что хотите удалить этот заказ?")) {
            var orderId = document.getElementById("orderId").value;
            // Отправка AJAX-запроса на удаление заказа с orderId на сервер
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_order.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("orderId=" + orderId);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        // Здесь можно обновить страницу или выполнить другие действия после удаления заказа
                    }
                }
            };
        }
    }
</script>

    
</body>
</html>