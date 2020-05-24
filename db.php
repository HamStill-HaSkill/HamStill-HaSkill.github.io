<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'Password780');
    define('DB_NAME', 'site');

    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno)  exit('Ошибка соединения с БД'); 
    $mysqli->set_charset('utf8');
?>
