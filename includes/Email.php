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

    $link = "http://".$_SERVER['HTTP_HOST']."/confirmation/".$id;
    
    $template = @file_get_contents("../emails/signup.html");

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

    $message = "We have reset your password. Your new password is ".$password.". Use this to sign in and then change your password to something memorable in the account settings.";

    return Email::sendEmail($to, "ScheduleSMS - Password reset", $message);

  }

  // affiliate email
  static public function affiliateEmail($to, $id) {

    global $config;

    $message = "Thank you for joining the ScheduleSMS affiliate program.\n\nYour affiliate code is: ".$id."\n\nSimply direct your customers to http://".$_SERVER['HTTP_HOST']."/?r=".$id." to get started";

    return Email::sendEmail($to, "ScheduleSMS - Affiliate code", $message);

  }

}

?>
