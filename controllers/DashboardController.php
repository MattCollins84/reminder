<?
  
  /*
   *  DashboardController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/Message.php");
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

      echo View::renderView("dashboard", $data);
          
    }

  }

?>