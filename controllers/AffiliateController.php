<?
  
  /*
   *  AffiliateController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Affiliate.php");
  require_once("includes/Validation.php");
  require_once("includes/Email.php");
  require_once("controllers/Controller.php");

  
  Class AffiliateController extends Controller {


    // create affiliate
    static public function create($rest) {
      
      global $config;

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("name", "email", "phone"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));
        exit;

      }

      $create = Affiliate::create($vars['name'], $vars['email'], $vars['phone'], $vars['details']);

      if ($create['id']) {
        $_SESSION['affiliate_id'] = $create['id'];
      }

      echo json_encode($create);
          
    }

    // welcome affiliate
    static public function welcome($rest) {
      
      global $config;

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      if (!isset($_SESSION['affiliate_id'])) {
        header("Location: /affiliates");
        exit;
      }

      $data['id'] = $_SESSION['affiliate_id'];
      unset($_SESSION['affiliate_id']);

      Email::affiliateEmail($vars['email'], $data['id']);

      echo View::renderView("affiliate_welcome", $data);
          
    }

  }
  
  

?>