<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

sendMail('awais','awaiszulifqar52@gmail.com' ,'asdsa','adasd');
// Instantiation and passing `true` enables exceptions
function sendMail( $to_name,$to_email  , $subject , $body ){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.googlemail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'softoxan@gmail.com';                     // SMTP username
        $mail->Password   = '#testsoft045#';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('softoxan@gmail.com', 'softoxan');
        $mail->addAddress($to_email, $to_name);     // Add a recipient
        // Content $to_email , $to_name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $result = $mail->send();
        
        print_r($result );
    return true;
        //echo 'Message has been sent';
    } catch (Exception $e) {
        print_r($e);
        return false;
       // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
