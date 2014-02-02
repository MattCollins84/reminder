<?php

require_once("includes/Cloudant.php");
require_once("includes/Validation.php");
require_once("includes/Customer.php");

class Message  {

  // create a message
  static public function createMessage($contact, $message, $date, $tokens=0) {

    if (!is_numeric($tokens)) {
      $tokens = 0;
    } else {
      $tokens = (int) $tokens;
    }

    $message = array(
      "contact_id" => $contact['_id'],
      "customer_id" => $contact['customer_id'],
      "message" => $message,
      "number" => $contact['mobile_phone'],
      "date" => $date,
      "tokens" => $tokens,
      "status" => "scheduled"
    );

    $res = Cloudant::doCurl("POST", "messages", $message);

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

  // update this message
  static public function update($message) {

    $res = Cloudant::doCurl("POST", "messages", $message);

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

  // get by id
  static public function getById($message_id) {

    $params = array("startkey" => '"'.$message_id.'"', "endkey" => '"'.$message_id.'"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "messages/_all_docs", array(), $params);

    return ($res['rows'][0]['doc']?$res['rows'][0]['doc']:false);

  }

  // get by customer id
  static public function getMessageByCustomerId($customer_id) {

    $params = array("key" => '"'.$customer_id.'"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byCustomerId", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // get by contact id
  static public function getMessageByContactId($contact_id) {

    $params = array("key" => '"'.$contact_id.'"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byContactId", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

}
?>
