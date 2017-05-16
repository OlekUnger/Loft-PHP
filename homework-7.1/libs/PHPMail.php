<?php
class PHPMail
{
    public static function sendEmail($email, $login)
    {

        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.mail.ru';                         // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'oleg.unger@mail.ru';                             // SMTP username
        $mail->Password = '00000';                         // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->setLanguage('ru');

        $mail->setFrom('oleg.unger@mail.ru', 'dz-7.1');
        $mail->addAddress($email, $login);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Регистрация на сайте dz-7.1';
        $mail->Body = "Вы успешно зарегистрированы. Ваш логин $login";

        if (!$mail->send()) {
            echo 'error';
        } else {
            return true;
        }
    }
}
