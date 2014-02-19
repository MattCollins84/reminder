<?
  date_default_timezone_set("Europe/London");

  $hour = (int) date("G");

  if ($hour < 9 || $hour > 17) {
    echo "GMT - Out of hours";
    exit;
  }

  require_once("includes/config.php");
  require_once("includes/Message.php");
  require_once("includes/Customer.php");
  require_once("includes/SMS.php");

  $messages = Message::getMessageByCountry("gb");
  $result = array();
  foreach ($messages as $msg) {

    $sms = SMS::sendSMS($msg['number'], $msg['message'], $msg['country']);

    // mark message as sent
    if ($sms['success']) {

      $msg['status'] = "sent";

      $update = Message::update($msg);

    }

    // restore these tokens, mark message as failed
    else {

      $msg['status'] = "failed";

      $update = Message::update($msg);

      $customer = Customer::getById($msg['customer_id']);

      if ($customer) {

        Customer::addTokens($customer, $msg['tokens']);

      }

    }

    $result[] = array("sms" => $sms, "update" => $update);

  }

  var_dump($messages, $result);

?>