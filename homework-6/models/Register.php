<?php
class Register
{

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkLoginExists($login)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login = '$login'";
        $result = $connection->query($sql);
        $connection->exec($sql);
        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }


    public static function userRegister($login, $password2)
    {
        $connection = Db::getConnection();
        $sql = "INSERT INTO users VALUES('', '$login', SHA('$password2'), '','','','' )";
        $connection->exec($sql);
    }

    public static function sendEmail($email, $login)
    {

        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.mail.ru';                         // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'oleg.unger@mail.ru';                             // SMTP username
        $mail->Password = 'jX12abQ6';                         // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->setLanguage('ru');

        $mail->setFrom('oleg.unger@mail.ru', 'dz-6');
        $mail->addAddress($email, $login);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Регистрация на сайте dz-6';
        $mail->Body = "Вы успешно зарегистрированы. Ваш логин $login";

        if (!$mail->send()) {
            echo 'error';
        } else {
            return true;
        }
    }

    public static function captcha()
    {
        if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
            $secret = '6LcAghsUAAAAAIpXEoP-vOLW6GiVDYIJKN4ZpD9F';
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $_POST['g-recaptcha-response'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
            $arr = json_decode($response, true);
            if ($arr['success']) {
                return true;
            } else {
                return false;
            }
        }
    }
}