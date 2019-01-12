<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$recv = $_POST['user_email'];
echo $recv;
//$password=$_GET['password'];
//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    
    
            $val = rand(1000,9999);
            echo $val;
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sanjayjanyani43@gmail.com';                 // SMTP username
    $mail->Password = '9730319048';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sanjayjanyani43@gmail.com', 'Sanjay');
    $mail->addAddress($recv);     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'One time OTP ';
    $mail->Body    = 'Use the following OTP to change your password  <b>'.$val.'</b>.Kindly change your password in profile section ';
    $mail->AltBody = 'your password is <b>'.$val.'</b> Kindly change your password before using it';

    $mail->send();
    echo 'Message has been sent';
    
    $_SESSION['OTP']=$val;
    $v=$_SESSION['OTP'];
    $_SESSION['email']=$recv;
    echo $v;
    header("Location: ../otp.php");
    exit();
//    $url=
//    echo '<script type="text/javascript">';
//echo 'window.location.href="../Admin/student_register.php';
//echo '</script>';
//    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


//echo "<script>window.location.href='../Admin/student_register.php?q=1'</script>";


//header("Location: ../Admin/student_register.php");
//exit();
