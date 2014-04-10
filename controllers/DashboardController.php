<?
  
  /*
   *  DashboardController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/Contact.php");
  require_once("includes/Message.php");
  require_once("includes/Transaction.php");
  require_once("includes/Tools.php");
  require_once("includes/twitteroauth/twitteroauth/twitteroauth.php");
  require_once("controllers/Controller.php");

  
  Class DashboardController extends Controller {


    // Render the homepage
    static public function renderDashboardHome($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
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

      $data['token_fixed'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);
      $data['token_custom'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);

      $data['messages_today'] = Message::getMessageByCustomerDate($data['active_customer']['_id'], date("Y-n-j"));

      $data['contacts'] = Contact::getContactsByCustomer($data['active_customer']['_id']);

      echo View::renderView("dashboard", $data);
          
    }

    // Render the account page
    static public function renderDashboardAccount($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['active_customer'] = Customer::getActiveCustomer();
      $data['show_success'] = ($_SESSION['account_changed'] === true?true:false);
      $_SESSION['account_changed'] = false;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("dashboard_account", $data);
          
    }

    // Render the contacts page
    static public function renderDashboardContacts($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = true;
      $data['active_customer'] = Customer::getActiveCustomer();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['contacts'] = Contact::getContactsByCustomer($data['active_customer']['_id']);

      echo View::renderView("dashboard_contacts", $data);
          
    }

    // Render the contacts page
    static public function renderDashboardEditContact($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = true;
      $data['active_customer'] = Customer::getActiveCustomer();
      $data['show_success'] = ($_SESSION['contact_edited'] === true?true:false);
      $_SESSION['contact_edited'] = false;

      $data['show_success_added'] = ($_SESSION['contact_created'] === true?true:false);
      $_SESSION['contact_created'] = false;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['contact'] = Contact::getById($h[2]);
      $data['contacts'] = Contact::getContactsByCustomer($data['active_customer']['_id']);
      
      $messages = Message::getMessageByContactId($data['contact']['_id']);
      $data['messages'] = array();

      foreach ($messages as $msg) {

        list($y, $m, $d) = explode("-", $msg['date']);
        
        $msg['orig_date'] = $msg['date'];

        $key = $y.$m.$d.$msg['_id'];

        $msg['date'] = Tools::dateFormat($msg['date'], $data['active_customer']['country']);

        $data['messages']["d".$key.$msg['_id']] = $msg;

      }
      
      ksort($data['messages']);
      
      $prevMonth = "start";
      foreach ($data['messages'] as $k => $msg) {

        list($y, $m, $d) = explode("-", $msg['orig_date']);
        
        $msg['month'] = date("F", mktime(0, 0, 0, $m, 10));
        
        if ($msg['month'] == $prevMonth) {
          $msg['month'] = "";
        } else {
          $prevMonth = $msg['month'];
        }

        $data['messages'][$k] = $msg;

      }

      echo View::renderView("dashboard_edit_contact", $data);
          
    }

    // Render the contacts page
    static public function renderDashboardScheduleContact($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = false;
      $data['date_js'] = true;
      $data['tokens'] = $config['tokens'];
      $data['active_customer'] = Customer::getActiveCustomer();
      $data['show_success'] = ($_SESSION['message_scheduled'] === true?true:false);
      $_SESSION['message_scheduled'] = false;

      $data['can_created_fixed'] = (bool) ($data['tokens']['cost'] <= $data['active_customer']['available_tokens']);
      $data['can_created_custom'] = (bool) ($data['tokens']['cost'] <= $data['active_customer']['available_tokens']);

      $data['hour'] = (int) date('G');

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      switch($data['active_customer']['country']) {

        case "gb":
        case "ie":
          $data['date_format'] = "d/m/Y";
          break;

        case "us":
          $data['date_format'] = "m/d/Y";
          break;

      }

      $data['contact'] = Contact::getById($h[2]);
      $data['contacts'] = Contact::getContactsByCustomer($data['active_customer']['_id']);
      $data['templates'] = Message::getTemplatesByCustomer($data['active_customer']['_id']);

      echo View::renderView("dashboard_schedule_contact", $data);
          
    }

    // Render the schedule
    static public function renderDashboardSchedule($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = false;
      $data['date_js'] = false;
      $data['tokens'] = $config['tokens'];
      $data['active_customer'] = Customer::getActiveCustomer();
      $data['contacts'] = Contact::getContactsByCustomer($data['active_customer']['_id']);

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $messages = Message::getMessageByCustomerId($data['active_customer']['_id']);
      $data['messages'] = array();

      foreach ($messages as $msg) {

        list($y, $m, $d) = explode("-", $msg['date']);
        
        $msg['orig_date'] = $msg['date'];

        $key = $y.$m.$d.$msg['_id'];

        $msg['date'] = Tools::dateFormat($msg['date'], $data['active_customer']['country']);

        $data['messages']["d".$key] = $msg;

      }
      
      ksort($data['messages']);
      
      $prevMonth = "start";
      foreach ($data['messages'] as $k => $msg) {

        list($y, $m, $d) = explode("-", $msg['orig_date']);
        
        $msg['month'] = date("F", mktime(0, 0, 0, $m, 10));
        
        if ($msg['month'] == $prevMonth) {
          $msg['month'] = "";
        } else {
          $prevMonth = $msg['month'];
        }

        $data['messages'][$k] = $msg;

      }

      echo View::renderView("dashboard_schedule", $data);
          
    }

    // Render the schedule
    static public function renderDashboardTokens($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = false;
      $data['date_js'] = false;
      $data['tokens'] = $config['tokens'];

      $data['active_customer'] = Customer::getActiveCustomer();
      $data['paypal_host'] = $config['paypal_host'];
      
      switch($data['active_customer']['country']) {

        case "gb":
        case "ie":
          $data['currency'] = "&pound;";
          $data['tax'] = "VAT";
          $data['plans'] = $config['plans']['gb'];
          $data['plans_country'] = "gb";
          break;

        case "us":
          $data['currency'] = "&dollar;";
          $data['tax'] = "Tax";
          $data['plans'] = $config['plans']['us'];
          $data['plans_country'] = "us";
          break;

      }

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

      $data['token_fixed'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);
      $data['token_custom'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['cost']);

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      

      echo View::renderView("dashboard_tokens", $data);
          
    }

    // Render the schedule
    static public function renderDashboardTransactions($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = false;
      $data['date_js'] = false;

      $data['active_customer'] = Customer::getActiveCustomer();
      $transactions = Transaction::getTransactionsByCustomerId($data['active_customer']['_id']);
      $data['transactions'] = array();


      foreach ($transactions as $trans) {

        $trans['date'] = Tools::dateFormat($trans['date'], $data['active_customer']['country']);
        switch($trans['plan']['currency']) {
          case "GBP":
            $trans['plan']['currency'] = "&pound;";
            break;
          case "USD":
            $trans['plan']['currency'] = "&dollar;";
            break;
        }
        $data['transactions'][] = $trans;

      }

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("dashboard_transactions", $data);
          
    }

    // Render the support page
    static public function renderDashboardSupport($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = false;
      $data['date_js'] = false;

      $data['active_customer'] = Customer::getActiveCustomer();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("dashboard_support", $data);
          
    }

    // Render the support page
    static public function renderDashboardTwitter($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
      $data['phone_js'] = false;
      $data['date_js'] = false;

      $data['active_customer'] = Customer::getActiveCustomer();
      $data['tokens'] = $config['tokens'];

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();



      // coming back from twitter
      if ($_SESSION['twitter_auth_step'] == 1) {
        
        unset($_SESSION['twitter_auth_step']);

        $connection = new TwitterOAuth($config['twitter']['CONSUMER_KEY'], $config['twitter']['CONSUMER_SECRET'], $_SESSION['temporary_credentials']['oauth_token'], $_SESSION['temporary_credentials']['oauth_token_secret']);

        $token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);

        $data['active_customer']['twitter_auth'] = $token_credentials;

        Customer::updateCustomer($data['active_customer']);
        $_SESSION['customer'] = Customer::getById($data['active_customer']['_id']);

      }

      echo View::renderView("dashboard_twitter", $data);
          
    }

    // Render the support page
    static public function renderDashboardTwitterAuth($rest) {
      
      global $config;

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      // is this the initial request?
      if (!$_SESSION['twitter_auth_step']) {
        
        $connection = new TwitterOAuth($config['twitter']['CONSUMER_KEY'], $config['twitter']['CONSUMER_SECRET']);
      
        $_SESSION['temporary_credentials'] = $connection->getRequestToken("http://".$_SERVER['HTTP_HOST']."/dashboard/twitter");

        $redirect_url = $connection->getAuthorizeURL($_SESSION['temporary_credentials']);

        $_SESSION['twitter_auth_step'] = 1;

        echo json_encode(array("redirect_url" => $redirect_url));
        
        exit;
      }

    }

    // Render the support page
    static public function renderDashboardTwitterTweet($rest) {
      
      global $config;

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();
      $data['tokens'] = $config['tokens'];
      
      if ($data['active_customer']['twitter_claim']) {
        exit;
      }

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $connection = new TwitterOAuth($config['twitter']['CONSUMER_KEY'], $config['twitter']['CONSUMER_SECRET'], $data['active_customer']['twitter_auth']['oauth_token'], $data['active_customer']['twitter_auth']['oauth_token_secret']);

      // tweet
      $status = $connection->post('statuses/update', array('status' => $vars['msg']));
      
      // follow
      $follow = $connection->post('friendships/create', array('user_id' => "2352168494"));

      // show this customer has claimed free tokens
      $data['active_customer']['twitter_claim'] = true;

      // add tokens and update customer
      Customer::addTokens($data['active_customer'], $data['tokens']['complimentary']);
      $_SESSION['customer'] = Customer::getById($data['active_customer']['_id']);

      // add transaction
      Transaction::createTransaction($data['active_customer']['_id'], array("price" => "FREE", "tokens" => $data['tokens']['complimentary']), "", "TWEET");

    }

  }

?>