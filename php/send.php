<?php


    // Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
    
    
    $recipient        = "Adus mail adress" 
    $mail             = $_POST['mail']; // mail address from registration
    $date             = $_POST['date']; // mail address from registration

    
    $subject = 'Anmeldung';
    $headers = "From: " . $mail . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso 8859-1\r\n";

    $message = '<html><body>';
    $message .= "Danke für die anmeldung am ".$date.". Du wirst in Kürze eine Mail mit weiteren Informationen erhalten.";
    $message .= "</body></html>";

        //-------------------------------------------------------


        // Order Text to Customer.
$subject_customer = l::get('bwestellung') . "ACUSTICA";

$headers_customer = "From: " . $recipient . "\r\n";
        //$headers_customer .= "Reply-To: ". $recipient . "\r\n";
$headers_customer .= "MIME-Version: 1.0\r\n";
$headers_customer .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message_customer = '<html><body>';
$message_customer .= '<h1>ACUSTICA ' . l::get('bestellung') . '</h1>';
$message_customer .= '<table rules="all" style="border-color: #000;" >';
$message_customer .= "<tr style='background: #fff;'>
<td>
    <strong>Adresse:</strong> 
</td>
<td>" . $anrede . "<br>"
   . $vname . "<br>"
   . $name . "<br>"
   . $adresse . "<br>"          
   . $adresszusatz . "<br>"     
   . $plz . "<br>"              
   . $ort . "<br>"              
   . $land . "<br>" 
   . $telefonnummer . 
   "<br>
</td>";                             
$message_customer .= "<tr style='background: #fff;'>
<td>
    <strong>" . l::get('bestellung') . ":</strong> 
</td>
<td>" 
    . l::get('zifferblatt'). ": " .  $zifferblatt . "<br>" 
    . l::get('armband') . ": " .  $armband . "<br>" 
    . l::get('sprache') . ": ".   $sprache . "<br>" 
    . l::get('sprachtype')  . ": ".$sprachtype . "<br>" 
    . l::get('zeitausgabe') . ": ". $zeitausgabe . 
    "</td>
</tr>";

$message_customer .= "</table>";
$message_customer .= "</body></html>";










        // Build the email headers.
$email_headers = "Bestellung: $name <$email>";

        // Send the email.
if ( mail($recipient, $subject, $message, $headers) ) {
            // Set a 200 (okay) response code.
    http_response_code(200);
    echo "email was sent to: $recipient ";
} else {
            // Set a 500 (internal server error) response code.
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message. --> $send";
}



        // Send the email.
if ( mail($mail, $subject_customer, $message_customer, $headers_customer) ) {
            // Set a 200 (okay) response code.
    http_response_code(200);
    echo "email was sent to: $recipient";
} else {
            // Set a 500 (internal server error) response code.
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message. --> $send";
}






} else {
        // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
    go("home");
}

?>