<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<p>Вы не авторизованы <a href='login.php'>Войти</a></p>";
    exit;
}

require_once('db.php');


if(isset($_POST['order_id'], $_POST['review'])){
    $id = (int)$_POST['order_id'];
    $review = $con->real_escape_string($_POST['review']);

    $con->query("UPDATE orders SET review='$review' WHERE id=$id");
}

$user_id = $_SESSION['user_id'];
$result = $con->query("SELECT * FROM orders WHERE user_id=$user_id");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Мои заявки</title>
<link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="site-header">
        <h1>Просмотр заявок</h1>
    </header>


<h2>Мои заявки, <?php echo $_SESSION['fullname']; ?>!</h2>

<p>
    <a href="main.php">Назад</a>
    <a href="logout.php">Выйти</a>
</p>

<div class="cards">

<?php while($row = $result->fetch_assoc()): ?>

    <div class="card">

        <p><b>Транспорт:</b> <?php echo htmlspecialchars($row['transport']); ?></p>
        <p><b>Дата:</b> <?php echo htmlspecialchars($row['choosing_date']); ?></p>
        <p><b>Оплата:</b> <?php echo htmlspecialchars($row['method_payment']); ?></p>
        <p><b>Статус:</b> <?php echo htmlspecialchars($row['status']); ?></p>
        <p><b>Отзыв:</b> <?php echo htmlspecialchars($row['review'] ?? ''); ?></p>

        <?php if ($row['status'] == "Обучение завершено"): ?>
            <form method="post">
                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                <input type="text" name="review" placeholder="Отзыв">
                <button type="submit">Сохранить</button>
            </form>
        <?php endif; ?>

    </div>

<?php endwhile; ?>

</div>

<footer class="site-footer">
        <p><strong>Наше местонахождение:</strong></p>
        <p>Адрес головного офиса: г. Москва, ул. Большая Ордынка, д. 15</p>
        <p>Телефон горячей линии: +7 (495) 123-45-67</p>
        <p>Если возникли вопросы или пожелания, позвоните нам. Ответим оперативно и подробно.</p>
    </footer>
</body>
</html>