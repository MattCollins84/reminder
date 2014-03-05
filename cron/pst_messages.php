<?
  date_default_timezone_set("America/Los_Angeles");

  $hour = (int) date("G");

  require_once("includes/config.php");
  require_once("includes/Message.php");
  require_once("includes/Customer.php");
  require_once("includes/SMS.php");

  $messages = Message::getMessageByUsTimezone("Los_Angeles");

  $result = array();
  foreach ($messages as $msg) {

    $sms = SMS::sendSMS($msg['number'], $msg['message'], $msg['country']);

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