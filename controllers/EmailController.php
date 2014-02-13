<?

  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Customer.php");
  require_once("includes/Email.php");
  require_once("controllers/Controller.php");
  
  Class EmailController extends Controller {


    // create a contact
    static public function emailSupport($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("subject", "email", "message"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));
        exit;

      }

      else {

        if (Email::supportEmail($vars['subject'], $vars['email'], $vars['message'], Customer::getActiveCustomer())) {

          echo json_encode(array(
            "success" => true
          ));
          exit;

        }

        else {
          echo json_encode(array(
            "success" => false,
            "error" => "We experienced a problem attempting to send this support request. Please try again."
          ));
          exit;
        }

      }
        
    }

  }

?>