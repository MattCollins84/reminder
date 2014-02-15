<?php

require_once("includes/Cloudant.php");
require_once("includes/Validation.php");

class Affiliate  {

  // create a message
  static public function create($name, $email, $phone, $details) {

    if (Validation::email($email) === false) {
      return array(
        "success" => false,
        "error" => "Invalid email address"
      );
    }
    
    $affiliate = array(
      "name" => $name,
      "email" => $email,
      "phone" => $phone,
      "details" => $details,
      "date" => date("Y-m-d")
    );

    $res = Cloudant::doCurl("POST", "affiliates", $affiliate);

    $response = array(
      "success" => $res['ok'],
    );

    if ($response['success']) {
      $response['id'] = $res['id'];
    } else {
      $response['error'] = "Cloudant error";
    }

    return $response;

  }

}
?>
