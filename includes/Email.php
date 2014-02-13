<?php

require_once("includes/config.php");

class Email  {

  // send an email
  static public function sendEmail($to, $subject, $message, $from="no-reply@schedulesms.com") {

    global $config;

    $headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if ($config['in_production'] === false) {
      $to = $config['test_email'];
    }

    if (mail($to, $subject, $message, $headers)) {
      return true;
    }

    return false;

  }

  // confirmation email
  static public function confirmationEmail($to, $id) {

    $message = "Thank you for starting your free trial with ScheduleSMS!\n\nWe just need to verify your email address, to do so please click this link:\nhttp://".$_SERVER['HTTP_HOST']."/confirmation/".$id;
    return Email::sendEmail($to, "ScheduleSMS - confirm email address", $message);

  }

  // support email
  static public function supportEmail($subject, $from, $message, $user) {

    global $config;

    $message .= "\n\n".print_r($user, true);

    return Email::sendEmail($config['support_email'], "[SUPPORT] - ".$subject, $message, $from);

  }

}

?>
