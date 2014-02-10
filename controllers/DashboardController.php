<?
  
  /*
   *  DashboardController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/Contact.php");
  require_once("includes/Message.php");
  require_once("includes/Tools.php");
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
      $data['token_bar'] = ($data['active_customer']['available_tokens'] / 10000) * 100;

      if ($data['token_bar'] >= 75) {
        $data['token_class'] = "progress-bar-success";
      }

      else if ($data['token_bar'] >= 25 && $data['token_bar'] < 75) {
        $data['token_class'] = "progress-bar-warning";
      }

      else {
        $data['token_class'] = "progress-bar-danger";
      }

      $data['token_fixed'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['fixed']);
      $data['token_custom'] = floor($data['active_customer']['available_tokens'] / $data['tokens']['custom']);

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
      $data['show_success'] = ($_SESSION['contact_created'] === true?true:false);
      $_SESSION['contact_created'] = false;

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

      $data['can_created_fixed'] = (bool) ($data['tokens']['fixed'] <= $data['active_customer']['available_tokens']);
      $data['can_created_custom'] = (bool) ($data['tokens']['custom'] <= $data['active_customer']['available_tokens']);

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      switch($data['active_customer']['country']) {

        case "gb":
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

  }

?>