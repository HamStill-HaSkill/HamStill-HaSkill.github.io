<?php
    include "db.php";
    session_start();
    
    if (!empty($_SESSION['login']))
    {
        header("Location: http://localhost/site.php");
    }

    if (isset($_POST['login'])) { 
        $login = htmlspecialchars($_POST['login']); 
    } 

    if (isset($_POST['password'])) {
        $password = md5(htmlspecialchars($_POST['password'])); 
    }

    $query = "SELECT id FROM users WHERE login='$login'";
    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
    if (!empty($row['id'])) {
        $mysqli->close();
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    $query = "INSERT INTO users (login, password) VALUES('$login','$password')";
    $result2 = $mysqli->query($query);

    if ($result2=='TRUE')
    {
        $_SESSION['login']=$login; 
        header("Location: http://localhost/site.php");
    }
    else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
    $mysqli->close();
?>