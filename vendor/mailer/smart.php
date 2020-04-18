<?php 

$phone = $_POST['tel'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vanyusha.kolesnikov.89@inbox.ru';                 // Наш логин
$mail->Password = '123456789AQ';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('vanyusha.kolesnikov.89@inbox.ru', 'Школа YES');   // От кого письмо 
$mail->addAddress('eithery86@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка на сайте';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Телефон: ' . $phone;

if(!$mail->send()) {
    echo "Сообщение не отправлено";
    echo "Ошибка: " . $mail->ErrorInfo;
} else {
    header ('Location: ../../thanks.html');
}

?>