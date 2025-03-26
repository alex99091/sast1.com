<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// 보안 설정 정보 로드
$config = require 'config.php';

// PHPMailer 설정
$mail = new PHPMailer(true);

if (isset($_POST["send"])) {
    try {
        $mail->isSMTP();
        $mail->Host = $config['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['SMTP_USER'];
        $mail->Password = $config['SMTP_PASSWORD'];
        $mail->SMTPSecure = $config['SMTP_SECURE'];
        $mail->Port = $config['SMTP_PORT'];

        // 발신자 & 수신자
        $mail->setFrom($config['SMTP_USER'], 'SAST1 Contact Bot');
        $mail->addAddress($_POST["email"]);

        // 메일 내용 설정
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body =
            'Name: ' . htmlspecialchars($_POST["name"]) . '<br>' .
            'Number: ' . htmlspecialchars($_POST["number"]) . '<br>' .
            'Email: ' . htmlspecialchars($_POST["email"]) . '<br>' .
            'Message: ' . nl2br(htmlspecialchars($_POST["message"]));

        $mail->send();

        echo "
            <script>
                alert('Sent Successfully');
                window.location.href = 'index.html';
            </script>
        ";
    } catch (Exception $e) {
        echo "
            <script>
                alert('Failed to send email: " . $e->getMessage() . "');
                window.location.href = 'index.html';
            </script>
        ";
    }
}
?>
