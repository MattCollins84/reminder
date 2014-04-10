<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("controllers/Controller.php");

  
  Class MainController extends Controller {


    // Render the homepage
    static public function renderHomepage($rest) {
      
      global $config;

      $data = array();

      $data['meta_description'] = "Schedule SMS messages for your customers. Perfect for appointment reminders & promotional messages. No monthly charges or ongoing costs, start your free trial now!";
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['tokens'] = $config['tokens'];
      $data['plans'] = $config['plans'];

      $data['avg_cost'] = (($data['plans']['gb'][2]['price'] * 100) / $data['plans']['gb'][2]['tokens']) * $data['tokens']['cost'];

      echo View::renderView("homepage", $data);
          
    }

    // Render the thankyou
    static public function renderThankyou($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("thankyou", $data);
          
    }

    // Render the thankyou
    static public function renderSignIn($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $data['password_changed'] = ($_SESSION['password_set']?true:false);
      unset($_SESSION['password_set']);

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("signin", $data);
          
    }

    // Render the thankyou
    static public function renderForgot($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;
       
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("forgot_password", $data);
          
    }

    // Render affiliates
    static public function renderAffiliates($rest) {
      
      global $config;

      $data = array();
      $data['nav_root'] = true;
      $data['meta_description'] = "Join the ScheduleSMS affiliate program and get 10% of all revenue generated by your referals. Sign up now and start earning straight away!";
        
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("affiliates", $data);
          
    }

    // Render affiliates
    static public function renderTFT($rest) {
      
      global $config;

      $data = array();
      $data['nav_root'] = true;
      $data['meta_description'] = "Earn free ScheduleSMS message credits simply by tweeting on our behalf! Sign up now to get started, and extend your free trial today!";
      $data['tokens'] = $config['tokens'];
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tweets_for_tokens", $data);
          
    }

    // Render terms
    static public function renderTerms($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("terms", $data);
          
    }

    // Render affiliates
    static public function renderPrivacy($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("privacy", $data);
          
    }

    // render password setup
    static public function renderPasswordSetup($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['customer_id'] = $h[1];

      echo View::renderView("password_setup", $data);
          
    }

    // Render affiliates
    static public function startTour($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("privacy", $data);
          
    }

  }
  
  

?>