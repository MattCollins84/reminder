<?
  
  /*
   *  TokenController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/PayPal.php");
  require_once("includes/View.php");
  require_once("includes/Transaction.php");
  require_once("controllers/Controller.php");

  
  Class TokenController extends Controller {


    // Render the homepage
    static public function start($rest) {
      
      global $config;

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $country = $h[2];
      $item_key = $h[3];

      switch($data['active_customer']['country']) {

        case "gb":
        case "ie":
          $data['currency'] = "&pound;";
          break;

        case "us":
          $data['currency'] = "&dollar;";
          break;

      }

      $plan = $config['plans'][$country][$item_key];

      $_SESSION['purchase_plan'] = $plan;
      $_SESSION['item_key'] = $item_key;

      $returnUrl = 'http://'.$_SERVER['HTTP_HOST'].'/dashboard/tokens/success';
      $cancelUrl = 'http://'.$_SERVER['HTTP_HOST'].'/dashboard/tokens/cancel';

      $paypalTrans = PayPal::SetExpressCheckout("ScheduleSMS - ".$plan['name']." (".$plan['tokens']." messages @ ".$data['currency'].$plan['price'].")", $plan['price'] , $plan['currency'], $returnUrl, $cancelUrl);

      // Redirect user back to i dunno
      PayPal::redirect($paypalTrans['TOKEN']);
          
    }

    static public function tokenSuccess($rest) {

      global $config;

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      // Get the PayPal Details
      $paypalDetails = PayPal::GetExpressCheckoutDetails($vars['token']);

      // collect the cash
      $collectMoney = PayPal::doExpressCheckoutPayment($vars['token'], $paypalDetails['PAYERID'], $_SESSION['purchase_plan']['price'], $_SESSION['purchase_plan']['currency']);
      
      $data['active_customer'] = Customer::getActiveCustomer();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['tokens'] = $config['tokens'];
      $data['token_bar'] = ($data['active_customer']['available_tokens'] / 1000) * 100;

      if ($data['token_bar'] >= 75) {
        $data['token_class'] = "progress-bar-success";
      }

      else if ($data['token_bar'] >= 25 && $data['token_bar'] < 75) {
        $data['token_class'] = "progress-bar-warning";
      }

      else {
        $data['token_class'] = "progress-bar-danger";
      }

      switch($data['active_customer']['country']) {

        case "gb":
        case "ie":
          $data['currency'] = "&pound;";
          break;

        case "us":
          $data['currency'] = "&dollar;";
          break;

      }

      $data['token_fixed'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);
      $data['token_custom'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);
      $data['plan'] = $_SESSION['purchase_plan'];
      $data['item_key'] = $_SESSION['item_key'];

      $data['paypal_ref'] = $collectMoney['PAYMENTINFO_0_TRANSACTIONID'];

      unset($_SESSION['purchase_plan']);
      unset($_SESSION['item_key']);

      // store the transaction
      $data['trans'] = Transaction::createTransaction($data['active_customer']['_id'], $data['plan'], $data['paypal_ref'], $data['active_customer']['ref_code']);

      // add the tokens
      Customer::addTokens($data['active_customer'], $data['plan']['tokens']);
      $_SESSION['customer'] = Customer::getById($data['active_customer']['_id']);
      $data['active_customer'] = Customer::getActiveCustomer();

      echo View::renderView("tokens_success", $data);
      
    }

    static public function tokenCancel($rest) {

      global $config;

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['tokens'] = $config['tokens'];
      $data['token_bar'] = ($data['active_customer']['available_tokens'] / 1000) * 100;

      if ($data['token_bar'] >= 75) {
        $data['token_class'] = "progress-bar-success";
      }

      else if ($data['token_bar'] >= 25 && $data['token_bar'] < 75) {
        $data['token_class'] = "progress-bar-warning";
      }

      else {
        $data['token_class'] = "progress-bar-danger";
      }

      switch($data['active_customer']['country']) {

        case "gb":
        case "ie":
          $data['currency'] = "&pound;";
          break;

        case "us":
          $data['currency'] = "&dollar;";
          break;

      }

      $data['token_fixed'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);
      $data['token_custom'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);
      $data['plan'] = $_SESSION['purchase_plan'];
      $data['item_key'] = $_SESSION['item_key'];

      unset($_SESSION['purchase_plan']);
      unset($_SESSION['item_key']);

      echo View::renderView("tokens_cancel", $data);
      
    }

  }
  
  

?>