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

$date            = $_POST['date']; // data from website
$mail_customer   = $_POST['mail']; // data from website
$vname           = $_POST['vname']; // data from website
$message = $vname." mit der email: ".$mail_customer." nimmt am ".$date." teil";



//Wird an angemeldeten gesendet
$mail_cus = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail_cus->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail_cus->isSMTP();                                      // Set mailer to use SMTP
    $mail_cus->Host = 'send.one.com';  // Specify main and backup SMTP servers
    $mail_cus->SMTPAuth = true;                               // Enable SMTP authentication
    $mail_cus->Username = 'anmeldung@vaginalove.ch';                 // SMTP username
    $mail_cus->Password = 'adou1992';                    // SMTP password
    $mail_cus->SMTPSecure = 'ssl';                       // Enable TLS encryption, `ssl` also accepted
    $mail_cus->Port = 465;                               // TCP port to connect to
    //Recipients
    $mail_cus->setFrom('anmeldung@vaginalove.ch', 'vaginalove');
    

    // GET DAT
    echo("<script>console.log('PHP-log: ".$message."');</script>");
    // GET DATA ENDE

    $mail_cus->addAddress($mail_customer);               // Name is optional
    $mail_cus->isHTML(true);                                  // Set email format to HTML
    $mail_cus->Subject = 'Danke für ihre anmeldung bei VaginaLove am ...';
    $mail_cus->Body    = $message;
    $mail_cus->AltBody = $message;

    $mail_cus->send();
    echo 'Message has been sent to:'.$mail_customer;
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


// Wird an host fvon der website gesendet
$mail_host = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail_host->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail_host->isSMTP();                                      // Set mailer to use SMTP
    $mail_host->Host = 'send.one.com';  // Specify main and backup SMTP servers
    $mail_host->SMTPAuth = true;                               // Enable SMTP authentication
    $mail_host->Username = 'anmeldung@vaginalove.ch';                 // SMTP username
    $mail_host->Password = 'adou1992';                    // SMTP password
    $mail_host->SMTPSecure = 'ssl';                       // Enable TLS encryption, `ssl` also accepted
    $mail_host->Port = 465;                               // TCP port to connect to
    //Recipients
    $mail_host->setFrom('anmeldung@vaginalove.ch', 'vaginalove');
    


        
    $message_host = "name:".$vname."\n emial: ".$mail_customer."\n nimmt tiel: ".$date;


    echo("<script>console.log('PHP-log: ".$message."');</script>");
    // GET DATA ENDE
    $mail_host->addAddress('info@vaginalove.ch');               // Name is optional

    $mail_host->isHTML(true);                                  // Set email format to HTML
    $mail_host->Subject = 'Neue Anmeldung für'.$date;
    $mail_host->Body    = $message_host;
    $mail_host->AltBody = $message_host;

    $mail_host->send();
    echo 'Message has been sent to:'.$mail_customer;
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}






?>