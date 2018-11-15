<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true); // Passing `true` enables exceptions
try {
    //Server settings
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 1; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP*/
    $mail->Host = 'mail.gmx.net'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication*/
    $mail->Username = 'skce@gmx.ch'; // SMTP username
    $mail->Password = 'G64i4sp&'; // SMTP password
    $mail->SMTPSecure = 'Tls'; // Enable TLS encryption, `ssl` also accepted*/
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('skce@gmx.ch', 'S&K Construction Equipment');
    $mail->addAddress('simon.y.h@gmx.ch', 'Simon Herrmann'); // Add a recipient
    $mail->addReplyTo('info@example.com', 'Informations');
    /*  $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    //Attachments
    /* $mail->addAttachment(); // Add attachments
    $mail->addAttachment(); // Optional name*/

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = '
    Danke für deine Bestellung';
    $mail->Body = '
    <b>Danke für deine Bestellung!</b>

    <b>Hallo Simon,</b>

   wir freuen uns, dass du etwas Sch&oumlnes gefunden hast!
    Sobald dein Paket auf dem Weg zu dir ist, erh&aumlltst du von uns eine Versandbest&aumltigung per E-Mail.



';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent bitchees';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
