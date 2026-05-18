<?php
require_once('db.php');


$fullname = trim($_POST['fullname']);
$birth_date = trim($_POST['birth_date']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$login =  trim($_POST['login']);
$password =  trim($_POST['password']);


if(!preg_match('/^[a-zA-ZА-Яа-яЁё\s]+$/u', $fullname)){
    header("Location:register.php?error=ФИО должно содержать только буквы");
    exit;
}

if(!preg_match('/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/', $phone)){
    header("Location:register.php?error=Телефон должен быть в формате 8(XXX)XXX-XX-XX");
    exit;
}


if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:register.php?error=Неверный формат Email");
    exit;
}


if(!preg_match('/^[A-Za-z0-9]+$/', $login)){
    header("Location:register.php?error=Логин должен содержать только латинские буквы и цифры");
    exit;
}

if(strlen($login) < 6){
    header("Location:register.php?error=Логин должен быть больше 6 символов");
    exit;
}


$result = $con->query("SELECT id FROM users WHERE login = '$login'");
if($result->num_rows > 0){
    header("Location:register.php?error=Такой логин уже занят");
    exit;
}


if(strlen($password) < 8){
    header("Location:register.php?error=Пароль должен быть больше 8 символов и более");
    exit;
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (fullname, birth_date, phone, email, login, password)
VALUES ('$fullname', '$birth_date', '$phone', '$email', '$login', '$hashed_password')";

if($con->query($sql) === TRUE){
    header("Location:login.php?success=Успешная регистрация");
    exit;
}else{
    header("Location:register.php?error=Произошла ошибка при регистрации");
    exit;
}
 