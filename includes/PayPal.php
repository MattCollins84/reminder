<?php
  require_once("includes/config.php");


  class PayPal {
    
    const CURRENCY_CODE ="USD";
    const SET_EXPRESS_CHECKOUT="SetExpressCheckout";
    const GET_EXPRESS_CHECKOUT_DETAILS="GetExpressCheckoutDetails";
    const DO_EXPRESS_CHECKOUT_PAYMENT = "DoExpressCheckoutPayment";
    const CREATE_RECURRING_PAYMENTS_PROFILE = "CreateRecurringPaymentsProfile";
    const GET_RECURRING_PAYMENTS_PROFILE_DETAILS = "GetRecurringPaymentsProfileDetails";
    
    // turn the data we get back from paypal into an associative array 
    // e.g. TOKEN=EC%2d0UP858717M817923P&TIMESTAMP=2013%2d02%2d01T11%3a28%3a18Z&CORRELATIONID=8c6bdb396038f&ACK=Success&VERSION=95&BUILD=4181146
    public static function parseQS($str) {
      $bits = split("&",$str);
      $retval=array();
      if($bits) {
        foreach($bits as $b) {
          $bits2 = split("=",$b);
          if($bits2) {
            $retval[$bits2[0]] = urldecode($bits2[1]);
          }
        }
      }
      return $retval;
    }
    
    // do a curl call to paypal where mode is GET/POST etc and arrParams is an associative array of parameters
    public function makeCurlCall($mode,$arrParams=array()) {
      
      global $config;
      

      $domain = $config['paypal']['endpoint'];
      
      $query = "";
      if($mode == "GET" || $mode == "DELETE") {
        $query.="?".http_build_query($arrParams);
      } 
      
      $url = $domain.$query;


      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 1);

      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $mode);

      
      if($mode == "GET") {        
        curl_setopt($ch, CURLOPT_POST, false);
      } else {
//        echo "SENDING\n";
//        echo http_build_query($arrParams);
//        echo "\n\n@@@@\n\n";
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arrParams));     
      }
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($ch);
      
      if(curl_errno($ch)){
        header("HTTP/1.1 503 Service unavailable");
        require_once("503.php");    
       }

      curl_close($ch);

      return PayPal::parseQS($output);
      return $arr;

    }
    
    // initiate a transaction with Paypal by pssing the amount, curreny and return urls.
    // paypal should send a token in reply which is used for the next stage
    static public function setExpressCheckout($descr,$amount,$currency_code,$return_url,$cancel_url) {
      global $config;
      
      $params = array();
      $params["METHOD"] = PayPal::SET_EXPRESS_CHECKOUT;
      $params["USER"] = $config['paypal']['username'];
      $params["PWD"] = $config['paypal']['password'];
      $params["SIGNATURE"] = $config['paypal']['signature'];
      $params["VERSION"] = 95;
      $params["PAYMENTREQUEST_0_DESC"] = $descr;
      $params["PAYMENTREQUEST_0_PAYMENTACTION"] = "Sale";
      $params["PAYMENTREQUEST_0_AMT"] = $amount;
      $params["PAYMENTREQUEST_0_CURRENCYCODE"] = $currency_code;   
      $params["SOLUTIONTYPE"] = "Mark"; // the buyer must have a PayPal account to checkout  (see https://www.x.com/developers/paypal/documentation-tools/api/setexpresscheckout-api-operation-nvp)  
      $params["returnUrl"] = $return_url;        
      $params["cancelUrl"] = $cancel_url; 
      
      // should return:
      /*
      Array
      (
          [TOKEN] => EC-0UP858717M817923P
          [TIMESTAMP] => 2013-02-01T11:28:18Z
          [CORRELATIONID] => 8c6bdb396038f
          [ACK] => Success
          [VERSION] => 95
          [BUILD] => 4181146
      )
      */
      
      return PayPal::makeCurlCall("POST",$params);
    }
    
    // paypal should send a token in reply which is used for the next stage
    static public function setExpressCheckoutRecurring($name, $amount, $currency_code, $first_payment, $billing_period, $return_url, $cancel_url) {
      global $config;
      
      $params["METHOD"] = PayPal::SET_EXPRESS_CHECKOUT;
      $params["USER"] = $config['paypal']['username'];
      $params["PWD"] = $config['paypal']['password'];
      $params["SIGNATURE"] = $config['paypal']['signature'];
      $params["VERSION"] = 109;
//      $params["NOSHIPPING"] = "1" ;
      $params["PAYMENTREQUEST_0_AMT"] = $amount;
      $params["PAYMENTREQUEST_0_CURRENCYCODE"] = $currency_code;
      $params["PAYMENTREQUEST_0_ITEMAMT"] = $amount;
      $params["PAYMENTREQUEST_0_DESC"] = $name;
      $params["DESC"] = $name;//." - ".$amount." ".$currency_code." ".$billing_period;      
      $params["L_BILLINGTYPE0"] = "RecurringPayments";
      $params["L_BILLINGAGREEMENTDESCRIPTION0"] = $name;//." - ".$amount." ".$currency_code." ".$billing_period;
      $paramsp["ALLOWNOTE"] = "0";
      $params["MAXAMT"] = $amount;
      $params["RETURNURL"] = $return_url;        
      $params["CANCELURL"] = $cancel_url; 
      // should return:

      /*
      Array
      (
          [TOKEN] => EC-0UP858717M817923P
          [TIMESTAMP] => 2013-02-01T11:28:18Z
          [CORRELATIONID] => 8c6bdb396038f
          [ACK] => Success
          [VERSION] => 95
          [BUILD] => 4181146
      )
      */
      
      return PayPal::makeCurlCall("POST",$params);
    }

    static public function createRecurringPaymentsProfile($token, $name, $amount, $currency_code, $billing_period, $email) {
      global $config;
      
      $params["METHOD"] = PayPal::CREATE_RECURRING_PAYMENTS_PROFILE;
      $params["USER"] = $config['paypal']['username'];
      $params["PWD"] = $config['paypal']['password'];
      $params["SIGNATURE"] = $config['paypal']['signature'];
      $params["VERSION"] = 109;
      $params["TOKEN"] = $token;
      switch($billing_period) {
        case "daily":
          $params["BILLINGPERIOD"] = "Day";
          $ts = strtotime("+1 day"); // calculate a month from now
          break;
        case "monthly":
        default:
          $params["BILLINGPERIOD"] = "Month";
          $ts = strtotime("+1 month"); // calculate a month from now
          break;
      }
      $params["PROFILESTARTDATE"] = date("Y-m-d",$ts)."T".date("H:i:s",$ts); // - the date in format 2014-03-05T03:00:00 format
      $params["DESC"] = $name;
      $params["BILLINGFREQUENCY"] = 1; //  one of the above billing periods
      $params["AMT"] = $amount;
      $params["CURRENCYCODE"] = $currency_code;
      $params["EMAIL"] = $email;

      // should return:
      /*
      Array
      (
          [TOKEN] => EC-0UP858717M817923P
          [TIMESTAMP] => 2013-02-01T11:28:18Z
          [CORRELATIONID] => 8c6bdb396038f
          [ACK] => Success
          [VERSION] => 95
          [BUILD] => 4181146
      )
      */
      
      return PayPal::makeCurlCall("POST",$params);
    }
    
    // redirect the browser to paypal, passing in the generated token
    static public function redirect($token) {
      global $config;
      $url = $config['paypal']['redirect_url']."?cmd=_express-checkout&token=".urlencode($token);
      header("Location: ".$url);
    }
    
    
    static public function getRecurringPaymentsProfileDetails($profile_id) {
      global $config;
      
      $params = array();
      $params["METHOD"] = PayPal::GET_RECURRING_PAYMENTS_PROFILE_DETAILS;
      $params["USER"] = $config['paypal']['username'];
      $params["PWD"] = $config['paypal']['password'];
      $params["SIGNATURE"] = $config['paypal']['signature'];
      $params["VERSION"] = 95;
      $params["PROFILEID"] = $profile_id;
      
      return PayPal::makeCurlCall("POST",$params);
      
    }
    
    // get the sellers details 
    static public function getExpressCheckoutDetails($token) {
      global $config;
      
      $params = array();
      $params["METHOD"] = PayPal::GET_EXPRESS_CHECKOUT_DETAILS;
      $params["USER"] = $config['paypal']['username'];
      $params["PWD"] = $config['paypal']['password'];
      $params["SIGNATURE"] = $config['paypal']['signature'];
      $params["VERSION"] = 95;
      $params["TOKEN"] = $token;
      //echo http_build_query($params);
      
      return PayPal::makeCurlCall("POST",$params);
    }
    
    
    // finalise a payment using the payer_id which was taken from getExpressCheckoutDetails, the token
    // received from setExpressCheckout and the amount/currency.
    static public function doExpressCheckoutPayment($token,$payer_id,$amount,$currency_code) {
      global $config;
            
      $params = array();
      $params["METHOD"] = PayPal::DO_EXPRESS_CHECKOUT_PAYMENT;
      $params["USER"] = $config['paypal']['username'];
      $params["PWD"] = $config['paypal']['password'];
      $params["SIGNATURE"] = $config['paypal']['signature'];
      $params["VERSION"] = 95;
      $params["TOKEN"] = $token;
      $params["PAYERID"] = $payer_id;
      $params["PAYMENTREQUEST_0_PAYMENTACTION"] = "Sale";
      $params["PAYMENTREQUEST_0_AMT"] = $amount;
      $params["PAYMENTREQUEST_0_CURRENCYCODE"] = $currency_code;
//      $params["AMT"] = $amount;
//      $params["CURRENCYCODE"] = $currency_code;
      
      
      //echo http_build_query($params);
      
      return PayPal::makeCurlCall("POST",$params);
      
    }
    
    
  }
  
?>