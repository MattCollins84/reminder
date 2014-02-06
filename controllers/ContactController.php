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
        $res = Contact::createContact($vars['customer_id'], $vars['name'], $vars['mobile_phone'], $vars['email'], $vars['notes']);
        $_SESSION['contact_created'] = true;
        echo json_encode($res);

      }
        
    }

    // update a contact
    static public function updateContact($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("contact_id", "name", "mobile_phone"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        if ($vars['email'] != "" && Validation::email($vars['email']) === false) {
          echo json_encode(array(
            "success" => false,
            "error" => "Invalid email address"
          ));
          exit;
        }

        $contact = Contact::getById($vars['contact_id']);

        $contact['name'] = $vars['name'];
        $contact['mobile_phone'] = $vars['mobile_phone'];
        $contact['email'] = $vars['email'];
        $contact['notes'] = $vars['notes'];

        $update = Contact::updateContact($contact);

        if ($update['success']) {
          $_SESSION['contact_edited'] = true;
          echo json_encode(array(
            "success" => true
          ));
          exit;
        }

        else {
          echo json_encode(array(
            "success" => false,
            "error" => "Unable to update contact"
          ));
          exit;
        }
          

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

        // get the customer
        $customer = Customer::getById($contact['customer_id']);

        if (!$customer) {
          echo json_encode(array(
            "success" => false,
            "error" => "Cannot find customer"
          ));
          exit;
        }

        $country = ($customer['country']?$customer['country']:"us");

        // send the SMS
        $sms = SMS::sendSMS($contact['mobile_phone'], $vars['message'], $country);

        echo json_encode($sms);

      }

    }

  }
  
  

?>