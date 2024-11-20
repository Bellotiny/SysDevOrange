<?php

use PHPMailer\PHPMailer\PHPMailer;

include_once "PHPMailer/src/PHPMailer.php";
include_once "PHPMailer/src/Exception.php";
include_once "PHPMailer/src/SMTP.php";

class Mail {
    public static function send(string $subject, string $message, string $sendEmail, string $sendName, string $replyEmail, string $replyName): string|true {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "snooknail@gmail.com";
            $mail->Password = "acza hivv igez jndn";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom("snooknail@gmail.com", "Snook's Nail Salon");
            $mail->addAddress($sendEmail, $sendName);
            $mail->addReplyTo($replyEmail, $replyName);

            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            if (!$mail->send()) {
                return $mail->ErrorInfo;
            }
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return $e->errorMessage();
        }
        return true;
    }
}