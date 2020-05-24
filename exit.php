<?php
session_start();
if (!empty($_SESSION['login']))
{
    unset($_SESSION['login']);
}
header("Location: http://localhost/index.html");
?>