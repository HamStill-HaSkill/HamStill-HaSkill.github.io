<?php 
    // $to = "algerd.efimov@gmail.com"; 
    // // емайл получателя 

    // $subject = "Проверка отправки писем"; 
    // // тема письма 

    // $text = "Здравствуйте Если вы читаете это письмо значит все ок Почтовый робот"; 

    // $headers = "From: <hello@gmail.com>\r\n";
    // $headers .= "Reply-to: <hello@gmail.com>\r\n";
    // $headers .= "Content-type: text/html; charset=utf-8";

    // //print(mail($to, $subject, $text, $headers));

    // if (mail($to, $subject, $text, $headers)) echo 'Письмо отправлено!';
    // else echo 'Письмо не отправлено';


require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = "jon";
$phone = "1337";
$email = "algerd.efimov@mail.com";

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lab7vt@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'RncutsG81SY^'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('lab7vt@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress("algerd.efimov@gmail.com");     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    echo 'ok';
}
?>