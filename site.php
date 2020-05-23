<?php
session_start();
if (empty($_SESSION['login']))
{
    exit ("У вас нет прав для доступа к сайту. <a href='log.php'>Вход</a>");
}

if( isset( $_POST["exit_btn"] ) )
{
    unset($_SESSION['login']);
    header("Location: http://localhost/log.php");
}
?>
<html>
 <head>
  <meta charset="utf-8">
  <title>Сайт</title>
 </head>
 <body>
 <h1>Содержимое сайта</h1>
  <form method="POST">
    <input type="submit" name="exit_btn" value="Выйти">
  </form>
 </body>
</html>