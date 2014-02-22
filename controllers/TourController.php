<?
  
  /*
   *  TourController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class TourController extends Controller {

    static public function startTour($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_dashboard", $data, true);
          
    }

    static public function tourAccount($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_account", $data, true);
          
    }

    static public function tourTokens($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_tokens", $data, true);
          
    }

    static public function tourContacts($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_contacts", $data, true);
          
    }

    static public function tourContactsEdit($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_contacts_edit", $data, true);
          
    }

    static public function tourContactsSchedule($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_contacts_schedule", $data, true);
          
    }

    static public function tourSchedule($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_schedule", $data, true);
          
    }

    static public function tourTrans($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_transactions", $data, true);
          
    }

    static public function tourSupport($rest) {
      
      global $config;

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("tour_support", $data, true);
          
    }

  }
  
  

?>