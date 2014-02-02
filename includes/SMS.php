<?

require_once("includes/twilio-php/Services/Twilio.php");

Class SMS {

  static public function sendSMS($number, $message) {

    global $config;

    if (!number) {
      return array(
        "success" => false,
        "error" => "Invalid number"
      );
    }

    $client = new Services_Twilio($config['twilio']['sid'], $config['twilio']['token']); 
  
    $data = array(
      'To'   => $number,
      'From' => "+441994342033", 
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

}

?>