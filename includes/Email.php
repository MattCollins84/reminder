<?php

class Email  {

  // send an email
  static public function sendEmail($to, $subject, $message) {

    $headers = 'From: no-reply@schedule-sms.com' . "\r\n" .
    'Reply-To: no-reply@schedule-sms.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
      return true;
    }

    return false;

  }

  // confirmation email
  static public function confirmationEmail($to, $id) {

    $message = "Thank you for starting your free trial with ScheduleSMS!\n\nWe just need to verify your email address, to do so please click this link:\nhttp://".$_SERVER['HTTP_HOST']."/confirmation/".$id;
    Email::sendEmail($to, "ScheduleSMS - confirm email address", $message);

  }

}

?>
