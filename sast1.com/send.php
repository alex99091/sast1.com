<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// 설정 파일 로드
$config = require 'config.php';

// PHPMailer 객체 생성
$mail = new PHPMailer(true);

if (isset($_POST["send"])) {
    try {
        // SMTP 설정
        $mail->isSMTP();
        $mail->Host = $config['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['SMTP_USER'];
        $mail->Password = $config['SMTP_PASSWORD'];
        $mail->SMTPSecure = $config['SMTP_SECURE'];
        $mail->Port = $config['SMTP_PORT'];

        // 보내는 사람 (고정)
        $mail->setFrom($config['SMTP_USER'], 'SAST1 Contact Form');

        // 수신자: 너의 Gmail 주소
        $mail->addAddress($config['SMTP_USER']);

        // 답장 받을 주소: 사용자가 입력한 이메일
        $mail->addReplyTo($_POST["email"], $_POST["name"]);

        // 이메일 내용 설정
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';

        $mail->Body =
            '<strong>Name:</strong> ' . htmlspecialchars($_POST["name"]) . '<br>' .
            '<strong>Number:</strong> ' . htmlspecialchars($_POST["number"]) . '<br>' .
            '<strong>Email:</strong> ' . htmlspecialchars($_POST["email"]) . '<br>' .
            '<strong>Message:</strong><br>' . nl2br(htmlspecialchars($_POST["message"]));

        $mail->AltBody =
            "Name: {$_POST["name"]}\n" .
            "Number: {$_POST["number"]}\n" .
            "Email: {$_POST["email"]}\n" .
            "Message:\n{$_POST["message"]}";

        // 이메일 전송
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
