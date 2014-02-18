<?
  date_default_timezone_set("Europe/London");

  $hour = (int) date("G");

  if ($hour <= 9 || $hour > 17) {
    echo "Out of hours";
    exit;
  }

  require_once("includes/config.php");
  require_once("includes/Message.php");
  require_once("includes/SMS.php");

  $sms = SMS::sendSMS("07731309552", "This is a test message", "gb");

?>