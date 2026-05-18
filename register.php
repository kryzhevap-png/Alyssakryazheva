<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="site-header">
        <h1>Регистрация пользователей</h1>
    </header>

    <h2 class="mt-4">Регистрация</h2>
    <form action="register_action.php" method="post">
        <label for="fullname">ФИО</label>
        <input type="text" id="fullname" name="fullname" class="form-control mb-3"  required placeholder="ФИО">

        <label for="birth_date">Дата рождения</label>
        <input type="date" id="birth_date" name="birth_date" class="form-control mb-3"  required>

        <label for="phone">Телефон</label>
        <input type="tel" id="phone" name="phone" class="form-control mb-3"  required placeholder="8(XXX)XXX-XX-XX">

          <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control mb-3"  required placeholder="Email">

         <label for="login">Логин</label>
        <input type="text" id="login" name="login" class="form-control mb-3"  required placeholder="Логин">
 
         <label for="password">Пароль</label>
        <input type="password" id="password" name="password" class="form-control mb-3" required>

<?php
if(isset($_GET['error'])){
    echo "<p style = 'color:red;'>". $_GET['error'] . "</p>";
}

if(isset($_GET['success'])){
    echo "<p style = 'color:green;'>" . $_GET['success'] . "</p>";
}
?>
        
<button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
    </form>

    <p class="mt-3 text-muted">Уже есть аккаунт?<a href="login.php">Войти</a></p>

    <!-- FOOTER -->
    <footer class="site-footer">
        <p><strong>Наше местонахождение:</strong></p>
        <p>Адрес головного офиса: г. Москва, ул. Большая Ордынка, д. 15</p>
        <p>Телефон горячей линии: +7 (495) 123-45-67</p>
        <p>Если возникли вопросы или пожелания, позвоните нам. Ответим оперативно и подробно.</p>
    </footer>

    <script src="jquery-3.7.1.min.js"></script>
    <script>
$(document).ready(function () {
    $("form").hide().fadeIn(800);
});
    </script>

</body>
</html>

 