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

  $messages = Message::getMessageByCountry("gb");
  $result = array();
  foreach ($messages as $msg) {

    $sms = SMS::sendSMS($msg['number'], $msg['message'], $msg['country']);

    if ($sms['success']) {

      $msg['status'] = "sent";

      $update = Message::update($msg);

    }

    $result[] = array("sms" => $sms, "update" => $update);

  }

  var_dump($messages, $result);

?>