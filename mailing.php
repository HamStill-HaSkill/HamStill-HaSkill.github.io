
<?php
include "db.php";
require_once('phpmailer/PHPMailerAutoload.php');
session_start();

if (isset($_POST['mess']) && isset($_POST['subj']) && isset($_POST['email'])) { 
    $mess = htmlspecialchars($_POST['mess']); 
    $subj = htmlspecialchars($_POST['subj']); 
    $user_email = htmlspecialchars($_POST['email']);

    $mail = new PHPMailer;
    $mail->CharSet = 'utf-8';

    $mail->isSMTP();                                     
    $mail->Host = 'smtp.mail.ru';  																						
    $mail->SMTPAuth = true;                               
    $mail->Username = 'lab7vt@mail.ru';
    $mail->Password = 'RncutsG81SY^'; 
    $mail->SMTPSecure = 'ssl';                 
    $mail->Port = 465; 

    $mail->setFrom('lab7vt@mail.ru'); 
    $query = "SELECT email FROM users WHERE mailing=1";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc())
    {
        $mail->addAddress($row['email']);
    };
    if ($user_email != '') {
        $mail->addAddress($user_email);
    }
    $mail->addReplyTo('wow@example.com', 'world of warcraft');
    $mail->addAttachment('img/img.jpg');    
    $mail->isHTML(false);                        
    $mail->Subject = $subj;
    $mail->Body    = $mess;
    $mail->AltBody = $mess;

    $mail->send();
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
            <form name="test" action="mailing.php" method="post">
                <p class="log-font">email:<br>
                <input name="email" type="text" maxlength=255 class="log-edit"></p>
                <p class="log-font">Тема:<br>
                <input name="subj" type="text" required placeholder="Тема" minlength=1 maxlength=255 class="log-edit"></p>
                <p class="log-font">Сообщение:<Br>
                <input name="mess" type="text" required placeholder="Сообщение" minlength=1 class="log-edit"></p>
                <p class="rule">
                <button type="submit" name="submit" class="pay-btn">Разослать</button>
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