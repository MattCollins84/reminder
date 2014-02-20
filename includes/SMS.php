<?

require_once("includes/twilio-php/Services/Twilio.php");

Class SMS {

  static public function sendSMS($number, $message, $country="us") {

    global $config;

    if (!$number) {
      return array(
        "success" => false,
        "error" => "Invalid number"
      );
    }

    if ($config['in_production'] === false) {
      $number = $config['test_number'];
    }

    $from = $config['numbers'][$country];

    if ($config['in_production'] === false) {
      $from = $config['test_sender'];
    }

    $client = new Services_Twilio($config['twilio']['sid'], $config['twilio']['token']); 
  
    $data = array(
      'To'   => $number,
      'From' => $from, 
      'Body' => $message  
    );

    try {

      $client->account->messages->create($data);

      return array(
        "success" => true
      );

    } catch(Exception $e) {

      return array(
        "success" => false,
        "error" => "Problem sending SMS",
        "data" => $data
      );

    }

  }

  static public function getLogs() {

    global $config;

    $client = new Services_Twilio($config['twilio']['sid'], $config['twilio']['token']);

    $messages = $client->account->messages->getIterator(0, 50, array('DateSent' => date("Y-m-d"))); 

    $ret = array();
    foreach ($messages as $message) {

      if ($message->direction != "inbound") {
        continue;
      }

      $x = array("body" => $message->body, "number" => $message->from);
      $ret[] = $x;

    }

    return $ret;

  }

}

?>