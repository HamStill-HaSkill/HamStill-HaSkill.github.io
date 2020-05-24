<?php
include "db.php";
session_start();
if (!empty($_SESSION['login']))
{
    header("Location: http://localhost/index.html");
}

if (isset($_POST['login']) && isset($_POST['password'])) { 
    $login = htmlspecialchars($_POST['login']); 
    $password = md5(htmlspecialchars($_POST['password'])); 

    $query = "SELECT * FROM users WHERE login='$login'";
    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
    if (empty($row['password'])) {
        echo '<script>alert("Извините, введённый вами логин или пароль неверный")</script>';       
    } else {
        if ($row['password']==$password) {
            $_SESSION['login']=$row['login']; 
            header("Location: http://localhost/index.html");
        }
        else {
            echo '<script>alert("Извините, введённый вами логин или пароль неверный")</script>';
        }
    }
}

$mysqli->close();


?>

<html lang="rus">
<head>
    <title>WoW Вход</title>
    <meta charset="utf-8">
    <link rel="import" href="template.php">
    <link rel="shortcut icon" href="/img/logo2.png" type="image/png">
    <link rel="stylesheet" href="scratch.css">
</head>
<body>
<script>
            var link = document.querySelector('link[rel=import]');
            var content = link.import.querySelector('#base-head');
            document.body.appendChild(content.cloneNode(true));
</script>
<style>
    .log-edit {
    width: 500px;
    font-size: 30px;
    }
    .log-font {
        font-size: 30px;
    }
</style>
</body>
</html>
<div class="pay-main">
        <aside class="pay-bar">
            <form name="test" action="login.php" method="post">
                <p class="log-font">Логин:<br>
                <input name="login" type="text" required pattern="[a-zA-Z0-9]+" minlength=4 maxlength=255 class="log-edit"></p>
                <p class="log-font">Пароль:<Br>
                <input name="password" type="password" required pattern="[a-zA-Z0-9]+" minlength=6 maxlength=255 class="log-edit"></p>
                <button type="submit" name="submit" class="pay-btn">Войти</button>
                <button onclick="document.location='register.php'" class="cancel-btn">Регистрация</button>
            </form>
        </aside>
</div>
<script>
        var content = link.import.querySelector('#base-footer');
        document.body.appendChild(content.cloneNode(true));
</script>
</body>
</html>