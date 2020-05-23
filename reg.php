<?php
    session_start();

    if (!empty($_SESSION['login']))
    {
        header("Location: http://localhost/site.php");
    }
?>
<html>
 <head>
  <meta charset="utf-8">
  <title>Календарь</title>
 </head>
 <body>
 <form method="POST" action="page.php">
  <label for="login">Логин:</label>
  <input type="text" name="login" required pattern="[a-zA-Z0-9]+" minlength=4 maxlength=255><br><br>
  <label for="password">Пароль:</label>
  <input type="password" name="password" required pattern="[a-zA-Z0-9]+" minlength=6 maxlength=255><br><br>
  <input type="submit" value="Submit">
</form>
 </body>
</html>
