<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/Contact.php");
  require_once("includes/SMS.php");
  require_once("controllers/Controller.php");

  
  Class ContactController extends Controller {


    // create a contact
    static public function createContact($rest) {
      
      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("customer_id", "name", "mobile_phone"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        // create the contact
        $res = Contact::createContact($vars['customer_id'], $vars['name'], $vars['mobile_phone'], $vars['email']);

        echo json_encode($res);

      }
        
    }

    // get contacts by customer_id
    static public function getContactsByCustomer($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("customer_id"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        // create the contact
        $contacts = Contact::getContactsByCustomer($vars['customer_id']);

        $res = array(
          "success" => true,
          "contacts" => $contacts
        );

        echo json_encode($res);

      }

    }

    
    // get contacts by customer_id
    static public function getContactById($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("id"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        // create the contact
        $contact = Contact::getById($vars['id']);

        $res = array(
          "success" => ($contact?true:false),
          "contact" => $contact
        );

        echo json_encode($res);

      }

    }

    static public function sendContactSMS($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("id", "message"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        // get the contact
        $contact = Contact::getById($vars['id']);

        if (!$contact) {
          echo json_encode(array(
            "success" => false,
            "error" => "Cannot find contact"
          ));
          exit;
        }

        // send the SMS
        $sms = SMS::sendSMS($contact['mobile_phone'], $vars['message']);

        echo json_encode($sms);

      }

    }

  }
  
  

?>