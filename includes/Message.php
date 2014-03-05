<?php

require_once("includes/Cloudant.php");
require_once("includes/Validation.php");
require_once("includes/Customer.php");

class Message  {

  // create a message
  static public function createMessage($contact, $message, $date, $time="0900",$tokens=0, $country="gb", $type="fixed", $timezone="") {

    if (!is_numeric($tokens)) {
      $tokens = 0;
    } else {
      $tokens = (int) $tokens;
    }

    $message = array(
      "contact_id" => $contact['_id'],
      "customer_id" => $contact['customer_id'],
      "contact_name" => $contact['name'],
      "message" => $message,
      "number" => $contact['mobile_phone'],
      "date" => $date,
      "time" => (int) $time,
      "tokens" => $tokens,
      "country" => $country,
      "type" => $type,
      "status" => "scheduled",
      "timezone" => $timezone
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
  static public function getMessageByCustomerId($customer_id, $year="", $month="", $day="", $status="scheduled") {

    if ($year == "") {
      $year = date("Y");
    }
    if ($month == "") {
      $month = date("n");
    }
    if ($day == "") {
      $day = date("j");
    }

    $params = array("startkey" => '["'.$customer_id.'","'.$status.'",'.$year.','.$month.','.$day.']', "endkey" => '["'.$customer_id.'","'.$status.'",3014,'.$month.','.$day.']', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byCustomerId", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // get by contact id
  static public function getMessageByContactId($contact_id, $year="", $month="", $day="", $status="scheduled") {

    if ($year == "") {
      $year = date("Y");
    }
    if ($month == "") {
      $month = date("n");
    }
    if ($day == "") {
      $day = date("j");
    }

    $params = array("startkey" => '["'.$contact_id.'","'.$status.'",'.$year.','.$month.','.$day.']', "endkey" => '["'.$contact_id.'","'.$status.'",3014,'.$month.','.$day.']', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byContactId", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // get by contact id
  static public function getMessageByCountry($country, $year="", $month="", $day="", $status="scheduled") {

    if ($year == "") {
      $year = date("Y");
    }
    if ($month == "") {
      $month = date("n");
    }
    if ($day == "") {
      $day = date("j");
    }

    $params = array("startkey" => '["'.$country.'","'.$status.'",'.$year.','.$month.','.$day.',0]', "endkey" => '["'.$country.'","'.$status.'",2014,'.$month.','.$day.','.date('G').'00]', "include_docs" => "true", "limit" => 10);

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byCountry", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // get by contact id
  static public function getMessageByUsTimezone($timezone, $year="", $month="", $day="", $status="scheduled") {

    if ($year == "") {
      $year = date("Y");
    }
    if ($month == "") {
      $month = date("n");
    }
    if ($day == "") {
      $day = date("j");
    }

    $params = array("startkey" => '["'.$timezone.'","'.$status.'",'.$year.','.$month.','.$day.',0]', "endkey" => '["'.$timezone.'","'.$status.'",2014,'.$month.','.$day.','.date('G').'00]', "include_docs" => "true", "limit" => 10);

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byUsTimezone", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // get by contact id
  static public function getMessageByCustomerDate($customer_id, $from, $to="") {

    if (!$to) {
      $to = $from;
    }

    $from = explode("-", $from);
    $to = explode("-", $to);

    $params = array("startkey" => '["'.$customer_id.'",'.$from[0].','.$from[1].','.$from[2].']', "endkey" => '["'.$customer_id.'",'.$to[0].','.$to[1].','.$to[2].']', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "messages/_design/find/_view/byCustomerDate", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // create a message template
  static public function createTemplate($customer_id, $name, $message, $date) {

    $template = array(
      "customer_id" => $customer_id,
      "name" => $name,
      "message" => $message,
      "date" => $date
    );

    $res = Cloudant::doCurl("POST", "templates", $template);

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

  // get by customer id
  static public function getTemplatesByCustomer($customer_id) {

    $params = array("key" => '"'.$customer_id.'"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "templates/_design/find/_view/byCustomer", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

}
?>
