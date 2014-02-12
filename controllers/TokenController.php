<?
  
  /*
   *  TokenController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/PayPal.php");
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

      $plan = $config['plans'][$country][$item_key];

      $_SESSION['purchase_plan'] = $plan;

      $returnUrl = 'http://'.$_SERVER['HTTP_HOST'].'/dashboard/tokens/success';
      $cancelUrl = 'http://'.$_SERVER['HTTP_HOST'].'/dashboard/tokens/cancel';

      $paypalTrans = PayPal::SetExpressCheckout("ScheduleSMS - ".$plan['name'], $plan['price'] , $plan['currency'], $returnUrl, $cancelUrl);

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
      
      echo "<pre>";
      var_dump($_SESSION['purchase_plan']);
      var_dump($collectMoney);

      //$collectMoney['PAYMENTINFO_0_TRANSACTIONID']
      
    }

    static public function tokenCancel($rest) {

      global $config;

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      var_dump($_SESSION['purchase_plan']);
      var_dump($h);
      var_dump($vars);
      
    }

  }
  
  

?>