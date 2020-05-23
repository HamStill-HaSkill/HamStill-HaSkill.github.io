<?php
    
    $to = "algerd.efimov@mail.ru"; 
    // емайл получателя 

    $subject = "Проверка отправки писем"; 
    // тема письма 

    $text = "Здравствуйте Если вы читаете это письмо значит все ок Почтовый робот"; 

    $headers = "From: <hello@gmail.com>\r\n";
    $headers .= "Reply-to: <hello@gmail.com>\r\n";
    $headers .= "Content-type: text/html; charset=utf-8";

    print(mail($to, $subject, $text, $headers));

    if (mail($to, $subject, $text)) echo 'Письмо отправлено!';
    else echo 'Письмо не отправлено';

?>