<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'Password780');
    define('DB_NAME', 'site');

    session_start();
    if (isset($_POST['login'])) { 
        $login = htmlspecialchars($_POST['login']);
    } 

    if (isset($_POST['password'])) {
         $password=md5(htmlspecialchars($_POST['password']));
    }
 
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno)  exit('Ошибка соединения с БД'); 
    $mysqli->set_charset('utf8');

    $query = "SELECT * FROM users WHERE login='$login'";
    $result = $mysqli->query($query);

   $row = $result->fetch_assoc();
    if (empty($row['password'])) {
        $mysqli->close();
        exit ("Извините, введённый вами login или пароль неверный.");
    } 
    else {
        if ($row['password']==$password) {
            $_SESSION['login']=$row['login']; 
            header("Location: http://localhost/site.php");
        }
        else {
            $mysqli->close();
            exit ("Извините, введённый вами login или пароль неверный.");
        }
    }
    
    $mysqli->close();


    ?>