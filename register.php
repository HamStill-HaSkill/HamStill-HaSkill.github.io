
<?php
include "db.php";
session_start();
if (!empty($_SESSION['login']))
{
    header("Location: http://localhost/index.html");
}

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) { 
    $login = htmlspecialchars($_POST['login']); 
    $password = md5(htmlspecialchars($_POST['password'])); 
    $email = htmlspecialchars($_POST['email']);
    if (!empty($_POST['mailing'])) {
        $mailing = 1;
    } else {
        $mailing = 0;
    }

    $query = "SELECT id FROM users WHERE login='$login'";
    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
    if (!empty($row['id'])) {
        echo '<script>alert("Пользователь с таким логином уже существует")</script>';       
    } else {
        $query = "INSERT INTO users (login, password, email, mailing) VALUES('$login','$password', '$email', '$mailing')";
        $result2 = $mysqli->query($query);

        if ($result2=='TRUE')
        {
            $mysqli->close();
            $_SESSION['login']=$login; 
            header("Location: http://localhost/index.html");
        }
        else {
            echo '<script>alert("Ошибка вы не зарегистрированы")</script>';
        }
    }
}

$mysqli->close();

?>

<html lang="rus">
<head>
    <title>WoW Регистрация</title>
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
            <form name="test" action="register.php" method="post">
                <p class="log-font">Логин:<br>
                <input name="login" type="text" required pattern="[a-zA-Z0-9]+" minlength=4 maxlength=255 class="log-edit"></p>
                <p class="log-font">email:<br>
                <input name="email" type="text" required pattern="[a-zA-Z0-9\@\.\_]+" minlength=4 maxlength=255 class="log-edit"></p>
                <p class="log-font">Пароль:<Br>
                <input name="password" type="password" required pattern="[a-zA-Z0-9]+" minlength=6 maxlength=255 class="log-edit"></p>
                <p class="rule">
                <input type="checkbox" name="mailing">&nbsp;&nbsp;Получать новости на email</p>
                <button type="submit" name="submit" class="pay-btn">Регистрация</button>
                <button onclick="document.location='login.php'" class="cancel-btn">Назад</button>
            </form>
        </aside>
</div>
<script>
        var content = link.import.querySelector('#base-footer');
        document.body.appendChild(content.cloneNode(true));
</script>
</body>
</html>