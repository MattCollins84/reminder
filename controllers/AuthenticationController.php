<?
  
  /*
   *  Authentication Controller
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Customer.php");
  require_once("includes/Validation.php");
  require_once("controllers/Controller.php");
  
  Class AuthenticationController extends Controller {

    // Make sure the user is logged in
    static public function authCustomer($rest) {
      
      return Customer::getActiveCustomer();

    }

    // Render the name input page
    static public function doSignIn($rest) {

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();


      $fail = json_encode(array(
        "success" => false,
        "error" => "Email address and/or password are invalid or not found. If you have not yet verified your account please check your emails."
      ));

      $errors = Validation::required(array("email", "password"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo $fail;
        exit;

      }

      else {

        $customer = Customer::getByEmailPassword($vars['email'], sha1($vars['password']));

        if (!$customer) {
          echo $fail;
          exit;
        }

        $_SESSION['customer'] = $customer;

        echo json_encode(array("success" => true));
        exit;

      }
          
    }

    static public function doSignOut($rest) {

      $_SESSION = array();

      header("Location: /");
      exit;

    }



  }

?>