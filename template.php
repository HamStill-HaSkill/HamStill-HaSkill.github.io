<?php
    include "db.php";
    include "os.php";
    $time = date('H:i:s d-m-Y');
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = $_SERVER['HTTP_REFERER'];
    $os = getBrowser()['platform'];
    $mysqli->query("INSERT INTO info (ip, time, os, url) VALUES ('$ip', '$time', '$os', '$url')");
    $mysqli->close();
?>
<div id="base-head">
        <header>
                <div class="header-bg">
                    <div class="semi-layer">
                        <div class="menu">
                            <div class="box2">
                                <a href="index.html" class="menu-href">
                                    <img src="img/logo4.png" class="logo" alt="Главная страница">
                                </a>
                            </div>

                            <div class="box">
                                <a href="shop.html" class="menu-href" id="shop">
                                    <span>МАГАЗИН</span>
                                </a>
                            </div>
            
                            <div class="box">
                                <a href="news.php" class="menu-href" id="news">
                                    <span>НОВОСТИ</span>
                                </a>
                            </div>
                            <div class="box">
                                <a href="info.php" class="menu-href" id="info">
                                    <span>ИНФО</span>
                                </a>
                            </div>
                            <div class="box">
                                <a href="mailing.php" class="menu-href" id="mail">
                                    <span>ПОЧТА</span>
                                </a>
                            </div>
                            <?php
                                session_start();
                                if (!empty($_SESSION['login']))
                                {
                                    echo "<div class='box'>
                                            <a href='exit.php' class='menu-href' id='log'>
                                                <span>Привет, ".$_SESSION['login'].". ВЫХОД</span>
                                            </a>
                                          </div>";
                                } else {
                                    echo '<div class="box">
                                            <a href="login.php" class="menu-href" id="log">
                                                <span>ВХОД</span>
                                            </a>
                                          </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </header>
</div>

<div id="base-footer">
        <footer>
                <p class="main-text" align="center" id="shop-footer">У нас нет прав 2000-2020. Платформы: PC, PS5, Xbox 365</p>
        </footer>
</div>