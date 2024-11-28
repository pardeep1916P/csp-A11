<?php
// Include PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email_1=$_GET["email_1"];
$email_2=$_GET["email_2"];
// Set up PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '201fa04327teja@gmail.com'; // Your Gmail email address
    $mail->Password   = 'yiuvdltajxzqdfmp';  // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('201fa04327teja@gmail.com', 'NeedFood');
    $mail->addAddress($email_1); // Email address from the request
    $mail->Subject = 'Subject of the email';
    $mail->isHTML(true);
    $mail->Body    = "You have a request from <p>{$email_2}</p>";

    // Send email
    $mail->send();
    
    // Redirect to home page on success
    echo "<script>alert('Request send successfuly');
     window.location.href = 'require.php';</script>";
} catch (Exception $e) {
    // Handle exceptions for email sending failure
    echo "Error sending email: {$mail->ErrorInfo}";
    exit;
}
?>
