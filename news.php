<?php
include "db.php";
session_start();

$query = "SELECT * FROM news_data" ;
$result = $mysqli->query($query);
$mysqli->close();
?>

<html lang="ru">
<head>
    <title>WoW Новости</title>
    <meta charset="utf-8">
    <link rel="import" href="template.php">
    <link rel="shortcut icon" href="/img/logo5.ico" type="image/x-icon">
    <link rel="stylesheet" href="scratch.css">
</head>
<body>
    <script>
        var link = document.querySelector('link[rel=import]');
        var content = link.import.querySelector('#base-head');
        document.body.appendChild(content.cloneNode(true));
    </script>
    <div class="news-line">
    <?php while($row = mysqli_fetch_array($result)):;?>
        <div class="news">
            <a href="detail.html">
                <img src=<?php echo $row['img'] ?> alt="HS" height="100" width="110" class="news-img">
            </a>
            <article class="news-text"><a href="detail.html" class="menu-href"><h1><?php echo $row['header'] ?></h1></a>
                <?php echo $row['data'] ?>
            </article>
        </div>
    <?php endwhile;?>
    <script>
            var content = link.import.querySelector('#base-footer');
            document.body.appendChild(content.cloneNode(true));
    </script>

</body>
</html>