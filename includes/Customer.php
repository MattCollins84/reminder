<?php

require_once("includes/Cloudant.php");
require_once("includes/Validation.php");

class Customer  {

	// create a customer
	static public function createCustomer($name, $email, $password, $country, $contact_phone, $contact_name, $tokens=0, $timezone="New_York") {

		if (Validation::email($email) === false) {
			return array(
				"success" => false,
				"error" => "Invalid email address"
			);
		}

		$existingCustomer = Customer::getByEmail($email);

		if ($existingCustomer) {
			return array(
				"success" => false,
				"error" => "Customer already exists with this email address"
			);
		}

		$customer = array(
			"name" => $name,
			"email" => $email,
			"password" => $password,
			"country" => $country,
			"contact_phone" => $contact_phone,
			"contact_name" => $contact_name,
			"available_tokens" => $tokens,
			"verified" => false,
			"timezone" => $timezone,
			"created" => date("Y-m-d")
		);

		if ($_SESSION['ref_code']) {
			$customer['ref_code'] = $_SESSION['ref_code'];
			unset($_SESSION['ref_code']);
		}

		$res = Cloudant::doCurl("POST", "customers", $customer);

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
	static public function updateCustomer($customer) {

		$res =  Cloudant::doCurl("POST", "customers", $customer);

		$res['customer'] = $customer;

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

	// get a customer by email
	static public function getByEmail($email) {

		$params = array("key" => '"'.$email.'"', "include_docs" => "true");

		$res = Cloudant::doCurl("GET", "customers/_design/find/_view/byEmail", array(), $params);

		return ($res['rows'][0]['doc']?$res['rows'][0]['doc']:false);

	}

	// get a customer by email and password
	static public function getByEmailPassword($email, $password) {

		$params = array("startkey" => '["'.$email.'","'.$password.'"]', "endkey" => '["'.$email.'","'.$password.'z"]', "include_docs" => "true");

		$res = Cloudant::doCurl("GET", "customers/_design/find/_view/byEmailPassword", array(), $params);

		return ($res['rows'][0]['doc']?$res['rows'][0]['doc']:false);

	}

	// get a user by social ID
	static public function getById($id) {

		$params = array("startkey" => '"'.$id.'"', "endkey" => '"'.$id.'"', "include_docs" => "true");

		$res = Cloudant::doCurl("GET", "customers/_all_docs", array(), $params);

		return ($res['rows'][0]['doc']?$res['rows'][0]['doc']:false);

	}

	// add tokens to a customer
	static public function addTokens($customer, $tokens) {

		if (!is_numeric($tokens)) {
			$tokens = 0;
		}

		if (!isset($customer['available_tokens'])) {
			$customer['available_tokens'] = 0;
		}
		
		$customer['available_tokens'] += (int) $tokens;

		$res =  Cloudant::doCurl("POST", "customers", $customer);

		$res['customer'] = $customer;

		return $res;

	}

	// remove tokens to a customer
	static public function removeTokens($customer, $tokens) {

		if (!is_numeric($tokens)) {
			$tokens = 0;
		}

		if (!isset($customer['available_tokens'])) {
			$customer['available_tokens'] = 0;
		}
		
		else {
			$customer['available_tokens'] -= (int) $tokens;
		}

		$res =  Cloudant::doCurl("POST", "customers", $customer);

		$res['customer'] = $customer;

		return $res;

	}

	static public function getActiveCustomer() {
		return ($_SESSION['customer']?$_SESSION['customer']:false);
	}

}
?>
