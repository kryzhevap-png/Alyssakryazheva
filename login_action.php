<?php
session_start();
require_once('db.php');
$login = $_POST['login'];
$password = $_POST['password'];
if($login === "Admin26" && $password === "Demo20"){
    $_SESSION['admin'] = true;
    header("Location:admin.php");
    exit;
}
$sql="SELECT * FROM users WHERE login = '$login'";
//$sql = "SELECT * FROM users WHERE login = '$login' AND email = '$email'";
$result = $con->query($sql);
if($result->num_rows > 0){
  $user = $result->fetch_assoc();
  if(password_verify($password, $user['password'])){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['fullname'] = $user['fullname'];
    header("Location:main.php");
    exit;
  }else{
     header("Location:login.php?error=Неверный пароль");
     exit;
  }
}else{
header("Location:login.php?error=Такого пользователя нет");
     exit;
}
