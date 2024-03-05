<?php
// Подключение к базе данных
$mysqli = new mysqli('localhost', 'root', '', 'FurStyle');
// Удаление пользователя
if(isset($_POST['deleteUser'])) {
  $userId = $_POST['userId'];
  $query = "DELETE FROM Client WHERE id = $userId";
  $mysqli->query($query);
  exit();
}

?>
<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    require("connect.php");

    $sql = "SELECT * FROM Client Where email = '$email'";

    if($result = $conn->query($sql))
    {
        if(mysqli_num_rows($result) == 0)
        {
            $sql = "INSERT INTO Client (firstName, lastName, password, phone, email, isAdmin, balance) 
            VALUES ('$firstName', '$lastName', '$password', '$phone', '$email', 0, 0)";
            if($conn->query($sql)){
                echo "Данные успешно добавлены";
            }
            else {
                die("Ошибка: " . $conn->error);
            }
            header("Location: ../pages/admin.php");
        }
    }

    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
?>