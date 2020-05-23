<?php
session_start();
?>

<html>
<head>
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<form action="test.php" method="post">
<p>
<label>Ваш логин:<br></label>
<input name="login" type="text" required pattern="[a-zA-Z0-9]+" minlength=4 maxlength=255>
</p>

<p>
<label>Ваш пароль:<br></label>
<input name="password" type="password" required pattern="[a-zA-Z0-9]+" minlength=6 maxlength=255>
</p>


<p>
<input type="submit" name="submit" value="Войти">
<br>
<a href="reg.php">Зарегистрироваться</a> 
</p></form>
<br>

<?php
if (!empty($_SESSION['login']))
{
    header("Location: http://localhost/site.php");
}

?>
</body>
</html>