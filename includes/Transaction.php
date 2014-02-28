<?php

require_once("includes/Cloudant.php");

class Transaction  {

  // create a trans
  static public function createTransaction($customer_id, $plan, $ref, $partner="") {

    if (!$plan) {
      return;
    }

    $transaction = array(
      "customer_id" => $customer_id,
      "plan" => $plan,
      "date" => date("Y-m-d"),
      "ref" => $ref,
      "partner" => $partner
    );

    $res = Cloudant::doCurl("POST", "transactions", $transaction);

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
  static public function getById($transaction_id) {

    $params = array("startkey" => '["'.$transaction_id.'"]', "endkey" => '["'.$transaction_id.'z"]', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "transactions/_all_docs", array(), $params);

    return ($res['rows'][0]['doc']?$res['rows'][0]['doc']:false);

  }

  // get by customer id
  static public function getTransactionsByCustomerId($customer_id) {

    $params = array("startkey" => '["'.$customer_id.'"]', "endkey" => '["'.$customer_id.'z"]', "include_docs" => "true");

    $res = Cloudant::doCurl("GET", "transactions/_design/find/_view/byCustomerId", array(), $params);

    $arr = array();
    foreach ($res['rows'] as $row) {

      $arr[] = $row['doc'];

    }

    return $arr;

  }

}
?>
