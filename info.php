
<?php
include "db.php";
session_start();

$query = "SELECT os, COUNT(os) FROM info GROUP BY os ORDER BY COUNT(os)";
$result = $mysqli->query($query);
$query = "SELECT ip, COUNT(ip) FROM info GROUP BY ip ORDER BY COUNT(ip)";
$result2 = $mysqli->query($query);
$query = "SELECT url, COUNT(url) FROM info GROUP BY url ORDER BY COUNT(url)";
$result3 = $mysqli->query($query);
$mysqli->close();

?>

<html lang="rus">
<head>
    <title>WoW Статистика</title>
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
    .info-table {
        color: #fff;
        font-size: 30px;
    }

</style>
  <table border="1" class="info-table">
        <thead> 
            <tr>
            <th>Операционная система</th>
            <th>Кол-во переходов</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result)):;?>
            <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
            </tr>
            <?php endwhile;?>
        </tbody>
 </table>
 <p></p>    
 <table border="1" class="info-table">
        <thead> 
            <tr>
            <th>IP</th>
            <th>Кол-во переходов</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result2)):;?>
            <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
               </tr>
            <?php endwhile;?>
        </tbody>
 </table>
 <p></p>    
 <table border="1" class="info-table">
        <thead> 
            <tr>
            <th>Страница</th>
            <th>Кол-во переходов</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result3)):;?>
            <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
               </tr>
            <?php endwhile;?>
        </tbody>
 </table>
 </body>
</html>
<script>
        var content = link.import.querySelector('#base-footer');
        document.body.appendChild(content.cloneNode(true));
</script>
</body>
</html>