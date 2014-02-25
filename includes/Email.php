<?php

require_once("includes/config.php");

class Email  {

  // send an email
  static public function sendEmail($to, $subject, $message, $from="no-reply@schedulesms.com", $html=true) {

    global $config;

    $headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if ($html) {
      $headers .= "\r\nMIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    }

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

    $link = "http://".$_SERVER['HTTP_HOST']."/confirmation/".$id;

    $template = file_get_contents("emails/signup.html");

    $message = str_replace("<%CONFIRM_LINK%>", $link, $template);

    return Email::sendEmail($to, "ScheduleSMS - welcome! Please confirm your email address.", $message);

  }

  // support email
  static public function supportEmail($subject, $from, $message, $user) {

    global $config;

    $message .= "\n\n".print_r($user, true);

    return Email::sendEmail($config['support_email'], "[SUPPORT] - ".$subject, $message, $from);

  }

  // forgot email
  static public function forgotEmail($to, $password) {

    global $config;

    $template = file_get_contents("emails/forgot.html");

    $message = str_replace("<%PASSWORD%>", $password, $template);

    return Email::sendEmail($to, "ScheduleSMS - Password reset", $message);

  }

  // affiliate email
  static public function affiliateEmail($to, $id) {

    global $config;

    $link = "http://".$_SERVER['HTTP_HOST']."/?r=".$id;
    $template = file_get_contents("emails/affiliate.html");

    $message = str_replace("<%CODE%>", $id, $template);
    $message = str_replace("<%LINK%>", $link, $message);

    return Email::sendEmail($to, "ScheduleSMS - Welcome to the affiliate program", $message);

  }

}

?>
