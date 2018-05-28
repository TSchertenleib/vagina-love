<?php
    // Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
    
    $basemail        = "info@vaginalove.ch"; // website mail-adress
    $date             = $_POST['date']; // data from website
    $mail_customer             = $_POST['mail']; // data from website

    
    //-------------------------------------------------------
    // Mail to Webserver Host 
    //-------------------------------------------------------
    $subject = 'Neue Anmeldung';
    $headers = "From: " . $mail_customer . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso 8859-1\r\n";

    $message = '<html><body>';
    $message .= "Neue Anmeldung am ".$date.". Mail adresse: ".$mail_customer;
    $message .= "</body></html>";

    //-------------------------------------------------------
    // Mail to Customer
    //-------------------------------------------------------
    $subject_customer = 'Anmeldung';
    $headers_customer = "From: " . $basemail . "\r\n";
    $headers_customer .= "MIME-Version: 1.0\r\n";
    $headers_customer .= "Content-Type: text/html; charset=iso 8859-1\r\n";

    $message_customer = '<html><body>';
    $message_customer .= "<h3>Danke für die Anmeldung am ".$date.". Du wirst in Kürze eine Mail mit weiteren Informationen erhalten.</h3>";
    $message_customer .= "</body></html>";        

        //-------------------------------------------------------
        // Mail to Webserver Host  - Send the email.
        //-------------------------------------------------------
        if ( mail($basemail, $subject, $message, $headers) ) {
                    // Set a 200 (okay) response code.
            http_response_code(200);
            echo "email was sent to:".$basemail;
        } else {
                    // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
        
        //-------------------------------------------------------
        // Mail to Customer - Send the email.
        //-------------------------------------------------------
        if ( mail($mail_customer, $subject_customer, $message_customer, $headers_customer) ) {
                    // Set a 200 (okay) response code.
            http_response_code(200);
            echo "email was sent to: ".$mail_customer;
        } else {
                    // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }


        $data = $date." ".$mail_customer;
    echo("<script>console.log('PHP: ".$data."');</script>");



    } else {
            // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>