<?php

require_once("includes/Cloudant.php");
require_once("includes/Validation.php");
require_once("includes/Customer.php");

class Contact  {

  // create a contact
  static public function createContact($customer_id, $name, $mobile_phone, $email="", $notes="") {

    if ($email != "" && Validation::email($email) === false) {
      return array(
        "success" => false,
        "error" => "Invalid email address"
      );
    }

    $customer = Customer::getById($customer_id);

    if (!$customer) {
      return array(
        "success" => false,
        "error" => "Cannot find customer"
      );
    }

    $contact = array(
      "customer_id" => $customer_id,
      "name" => $name,
      "mobile_phone" => $mobile_phone,
      "email" => $email,
      "notes" => $notes
    );

    $res = Cloudant::doCurl("POST", "contacts", $contact);

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

  // update a customer
  static public function updateContact($contact) {

    $res =  Cloudant::doCurl("POST", "contacts", $contact);

    $res['contact'] = $contact;

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

  // get customer contacts
  static public function getContactsByCustomer($customer_id) {

    $params = array("key" => '"'.$customer_id.'"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "contacts/_design/find/_view/byCustomer", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

  // get customer contact by id
  static public function getById($contact_id) {

    $params = array("startkey" => '"'.$contact_id.'"', "endkey" => '"'.$contact_id.'"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "contacts/_all_docs", array(), $params);

    return ($res['rows'][0]['doc']?$res['rows'][0]['doc']:false);

  }

  // by number
  static public function getByNumber($number) {

    $params = array("startkey" => '"'.$number.'"', "endkey" => '"'.$number.'z"', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "contacts/_design/find/_view/byNumber", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

}
?>
