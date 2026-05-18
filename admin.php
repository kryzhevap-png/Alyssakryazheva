
<?php
session_start();

if(!isset($_SESSION['admin'])){
    echo "<p>Вы не админ <a href='login.php'>Войти</a></p>";
    exit;
}

require_once('db.php');

$filter = $_GET['filter'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = (int)$_POST['id'];
    $status = $con->real_escape_string($_POST['status']);

    $sql = "UPDATE orders SET status='$status' WHERE id=$id";

    if($con->query($sql) === TRUE){
        echo "<p style='color:green;'>Статус обновлён</p>";
    } else {
        echo "<p>Ошибка</p>";
    }
}
$sql="SELECT * FROM orders";

if($filter != ''){
    $sql .= " WHERE status='$filter'";
}
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Админ</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <header class="site-header">
        <h1>Админ панель</h1>
    </header>

<h2>Админ панель</h2>

<a href="logout.php">Выйти</a>

<h3>Заявки</h3>
<form method="get">
 <select name="filter" class="form-select mb-3">
            <option value="">Все</option>
     <option value="Новая">Новая</option>
                <option value="Идет обучение">Идет обучение</option>
                <option value="Обучение завершено">Обучение завершено</option>
        </select>
       <button type="submit">Фильтровать</button> 
</form>
<table border="1">
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Транспорт</th>
    <th>Выбирите дату</th>
    <th>Метод оплаты</th>
    <th>Статус</th>
    <th>Изменить статус</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
   <td><?php echo $row['id']; ?></td>

     <td><?php echo $row['user_id']; ?></td>

<td><?php echo htmlspecialchars($row['transport']); ?></td>

<td><?php echo htmlspecialchars($row['choosing_date']); ?></td>

<td><?php echo htmlspecialchars($row['method_payment']); ?></td>

<td><?php echo htmlspecialchars($row['status']); ?></td>
    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <select name="status">
                <option value="Новая">Новая</option>
                <option value="Идет обучение">Идет обучение</option>
                <option value="Обучение завершено">Обучение завершено</option>
            </select>

            <button type="submit">Сохранить</button>
        </form>
    </td>
</tr>
<?php endwhile; ?>

</table>
<footer class="site-footer">
        <p><strong>Наше местонахождение:</strong></p>
        <p>Адрес головного офиса: г. Москва, ул. Большая Ордынка, д. 15</p>
        <p>Телефон горячей линии: +7 (495) 123-45-67</p>
        <p>Если возникли вопросы или пожелания, позвоните нам. Ответим оперативно и подробно.</p>
    </footer>
</body>
</html>