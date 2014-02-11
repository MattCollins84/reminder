<?
  chdir(dirname($_SERVER['PHP_SELF']));

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