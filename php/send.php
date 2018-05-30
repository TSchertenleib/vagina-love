<?php

// *************************
// * PHP Mailer
// *************************
echo "PHPMailer --> Start!";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'send.one.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'anmeldung@vaginalove.ch';                 // SMTP username
    $mail->Password = 'adou1992';                    // SMTP password
    $mail->SMTPSecure = 'ssl';                       // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                               // TCP port to connect to
    //Recipients
    $mail->setFrom('anmeldung@vaginalove.ch', 'vaginalove');
    

    // GET DATA
    //$basemail        = "info@vaginalove.ch"; // website mail-adress
    $date            = $_POST['date']; // data from website
    $mail_customer   = $_POST['mail']; // data from website
    $message = $mail_customer." nimmt am ".$date." teil";
    echo("<script>console.log('PHP-log: ".$message."');</script>");
    // GET DATA ENDE

    $mail->addAddress($mail_customer);               // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent to:'.$mail_customer;
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



   



?>