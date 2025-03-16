<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// PHPMailer 객체 생성
$mail = new PHPMailer(true);

if (isset($_POST["send"])) {
    try {
        // SMTP 설정
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sast1.sdn.bhd@gmail.com'; // 지메일 계정
        $mail->Password = 'fnwzkpsgkpuoipbv'; // 지메일 앱 비밀번호
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // 보내는 사람 및 수신자 설정
        $mail->setFrom('sast1.sdn.bhd@gmail.com'); // 지메일 계정
        // $mail->addAddress('sast1.sdn.bhd@gmail.com');
        $mail->addAddress($_POST["email"]);

        // 이메일 내용 설정
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission'; // 이메일 제목
        $mail->Body = 'Name: ' . $_POST["name"] . '<br>' .
                      'Number: ' . $_POST["number"] . '<br>' .
                      'Email: ' . $_POST["email"] . '<br>' .
                      'Message: ' . $_POST["message"];

        // 이메일 보내기
        $mail->send();

        echo
        "
        <script>
        alert('Sent Successfully');
        document.location.href = 'index.html';
        </script>
        ";
    } catch (Exception $e) {
        echo
        "
        <script>
        alert('Sent Failed');
        document.location.href = 'index.html';
        </script>
        ", $e->getMessage();
    }
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "PHP is running!";
?>
