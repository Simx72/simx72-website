<?php
/*
 * Simx72 website
 * 
 * @author Simx72
 * @link mailto:angel2600@proton.me
 * @link http://sdesim.ca/
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 * -----
 * Copyright (C) 2024  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/db.php';






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendmail(array $recipients, string $subject, string $message, $attachments = array())
{
    try {
        //Server settings
        $mail = new PHPMailer();
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $smtp = getSMTPConfig();
        // var_dump($smtp);
        $mail->Host = $smtp['smtp_host'][0];              //Set the SMTP server to send through
        $mail->SMTPAuth = true;                               //Enable SMTP authentication
        $mail->Username = $smtp['smtp_username'][0];          //SMTP username
        $mail->Password = $smtp['smtp_password'][0];          //SMTP password
        $mail->SMTPSecure = $smtp['smtp_security'][0];        //Encryption type
        $mail->Port = (int)$smtp['smtp_port'][0];              //SMTP port

        // Destinatarios
        $mail->setFrom($smtp['smtp_email'][0], $smtp['smtp_apodo'][0]);
        foreach ($recipients as $recipient) {
            $mail->addAddress($recipient);               // Name is optional
        }


        // Adjuntos
        foreach ($attachments as $attachment) {
            $mail->addAttachment($attachment[0], $attachment[1]);   //Add attachments
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();

    } catch (Exception $e) {
        throw $e;
    }
}


// $mailer = new PHPMailer();