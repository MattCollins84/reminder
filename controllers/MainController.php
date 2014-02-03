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

      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['tokens'] = $config['tokens'];
      $data['plans'] = $config['plans'];

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

  }
  
  

?>