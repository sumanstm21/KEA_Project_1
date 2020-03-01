<?php
$sPassword = file_get_contents('private/password.txt');
// $sPassword;
if( strlen($_POST['subject']) < 2 || strlen($_POST['subject']) > 50){
    echo 'Subject should be between 2 to 50 character';
    exit();
}
if( strlen($_POST['message']) < 5 || strlen($_POST['message']) > 500){
    echo 'Message should be between 5 to 500 character';
    exit();
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


// Load Composer's autoloader
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'linuxsuman21@gmail.com';                     // SMTP username
    $mail->Password   = $sPassword;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('linuxsuman21@gmail.com', 'Mailer');
    $mail->addAddress('linuxsuman21@gmail.com', 'Suman');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('linuxsuman21@gmail.com', 'Reply');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'Testing the Flight system';
    // $mail->Body    = 'Thank you for buying your ticket';
    $mail->Subject = 'Booking';
    $sCode = $_POST["bookingCode"];
    $mail->Body    = "Your air ticket has been booked. You can track your application with ID : $sCode and your last name";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}












