<?php
  // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
function sendEmail($to, $subject, $body) {
    // Required files
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                              // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                    // Enable SMTP authentication
        $mail->Username   = '201fa04327teja@gmail.com';  // SMTP write your email
        $mail->Password   = 'yiuvdltajxzqdfmp';         // SMTP password
        $mail->SMTPSecure = 'tls';                   // Enable implicit SSL encryption
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('201fa04327teja@gmail.com', 'NeedFood');  // Sender Email and name
        $mail->addAddress($to);               // Add a recipient email
        $mail->addReplyTo('your-email@gmail.com', 'Your Name'); // Reply to sender email

        // Content
        $mail->isHTML(true);                  // Set email format to HTML
        $mail->Subject = $subject;            // Email subject heading
        $mail->Body    = $body;               // Email message

        // Attempt to send the email
        $mail->send();

        // Success sent message alert
        echo "
            <script>
                alert('Message was sent successfully!');
                window.location.href = 'home.php';
            </script>
        ";
    } catch (Exception $e) {
        // Handle exceptions for email sending failure
        echo "
            <script>
                alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
            </script>
        ";
    }
}

$emailString = $_GET['mail'];
$emails = explode('-', $emailString);
$datetime = $_GET['datetime'];
$foodType = $_GET['food_type'];
$quantity = $_GET['quantity'];
$location = $_GET['location'];
$mobileNumber = $_GET['mobile_number'];

// Compose the email body
$emailBody = "
    <h2>Food Donation Details</h2>
    <p>Date and Time: $datetime</p>
    <p>Type of Food: $foodType</p>
    <p>Quantity: $quantity</p>
    <p>Location: $location</p>
    <p>Mobile Number: $mobileNumber</p>
";

// Send emails to each recipient using the function
foreach ($emails as $email) {
    sendEmail($email, 'Food Donation Details', $emailBody);
}

?>
