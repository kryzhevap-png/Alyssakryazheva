<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<p>Вы не зарегистрированы <a href='login.php'>Войти</a></p>";
    exit;
}
require_once('db.php');


if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $transport = $_POST['transport'];
    $choosing_date = $_POST['choosing_date'];
    $method_payment = $_POST['method_payment'];
    $user_id = $_SESSION['user_id'];
    $status = "Новая";
    if(empty($transport) || empty($choosing_date) || empty($method_payment)){
        echo "<p>Ошибка</p>";
    }else{
        $sql = "INSERT INTO orders (user_id, transport, choosing_date, method_payment, status)
        VALUES ('$user_id', '$transport', '$choosing_date', '$method_payment', '$status')";
        if($con->query($sql) === TRUE){
            echo "<p style='color:green; text-align:center;'>Заявка отправлена</p>";
        }else{
            echo "<p>Произошла ошибка</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Главная</title>
  <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <h1>Оформление заявки</h1>
    </header>
<h2>Добро пожаловать <?php echo $_SESSION['fullname']; ?></h2>

<a href="logout.php">Выйти</a>

<h3>Оформить заявку</h3>

<form action="main.php" method="post">

<label for="transport">Выберите транспорт</label>
<select id="transport" name="transport" class="form-select mb-3" required>
    <option value="Катер">Катер</option>
    <option value="Круизный лайнер">Круизный лайнер</option>
    <option value="яхта">Яхта</option>
</select>

<label for="choosing_date">Выберите дату</label>
<input type="date" id="choosing_date" name="choosing_date" class="form-control mb-3" required>


<label for="method_payment">Выберите способ оплаты</label>
<select id="method_payment" name="method_payment" class="form-select mb-3" required>
    <option value="Предоплата по QR-код"> Предоплата по QR-код</option>
    <option value="Оплата картой МИР">Оплата картой МИР</option>
    <option value="Постоплата в офисе организации">Постоплата в офисе организации</option>
</select>

<button class="btn btn-primary" type="submit">Оформить</button>

</form>
<a href="my_booking.php">Посмотреть заявки</a>

<footer class="site-footer">
        <p><strong>Наше местонахождение:</strong></p>
        <p>Адрес головного офиса: г. Москва, ул. Большая Ордынка, д. 15</p>
        <p>Телефон горячей линии: +7 (495) 123-45-67</p>
        <p>Если возникли вопросы или пожелания, позвоните нам. Ответим оперативно и подробно.</p>
    </footer>
</body>
</html>