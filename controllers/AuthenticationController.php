<?
  
  /*
   *  Authentication Controller
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");
  
  Class AuthenticationController extends Controller {

    // Make sure the user is logged in
    static public function isAuthenticated($rest) {
      
      return true;
      return User::getActiveUser();

    }

    // Render the name input page
    static public function renderSignIn($rest) {

      $data = array();

      echo View::renderView("signin", $data);
          
    }

    static public function doSignOut($rest) {

      $_SESSION = array();

      header("Location: /");
      exit;

    }

  }

?>