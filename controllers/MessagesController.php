<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("includes/Contact.php");
  require_once("includes/SMS.php");
  require_once("includes/Message.php");
  require_once("controllers/Controller.php");

  
  Class MessagesController extends Controller {


    // create a contact
    static public function createMessage($rest) {
      
      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("contact_id", "message", "date", "tokens"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        // get the contact
        $contact = Contact::getById($vars['contact_id']);

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

        // token check
        if ($vars['tokens'] && is_numeric($vars['tokens']) && (int) $customer['available_tokens'] < (int) $vars['tokens']) {

          echo json_encode(array(
            "success" => false,
            "error" => "Not enough available tokens"
          ));
          exit;

        }

        // create the message
        $message = Message::createMessage($contact, $vars['message'], $vars['date'], $vars['tokens']);

        // if we're successful, remove these tokens
        if ($message['success'] && $vars['tokens'] && is_numeric($vars['tokens'])) {
          Customer::removeTokens($customer, $vars['tokens']);
        }

        echo json_encode($message);

      }
        
    }

    // get message by id
    static public function getMessageById($rest) {

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

        $message = Message::getById($vars['id']);

        $res = array(
          "success" => ($message?true:false),
          "message" => $message
        );

        echo json_encode($res);

      }

    }

    // get messages by customer_id
    static public function getMessagesByCustomerId($rest) {

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
        $messages = Message::getMessageByCustomerId($vars['customer_id']);

        $res = array(
          "success" => true,
          "messages" => $messages
        );

        echo json_encode($res);

      }

    }

    // get messages by contact id
    static public function getMessagesByContactId($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("contact_id"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        // create the contact
        $messages = Message::getMessageByContactId($vars['contact_id']);

        $res = array(
          "success" => true,
          "messages" => $messages
        );

        echo json_encode($res);

      }

    }

    // send a message
    static public function sendMessage($rest) {

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

        $message = Message::getById($vars['id']);

        if (!$message) {
          return array(
            "success" => false,
            "error" => "Cannot find message"
          );
        }

        if ($message['status'] != "scheduled") {
          echo json_encode(array(
            "success" => false,
            "error" => "Message is not marked as scheduled"
          ));
          exit;
        }

        // get the customer
        $customer = Customer::getById($message['customer_id']);

        if (!$customer) {
          echo json_encode(array(
            "success" => false,
            "error" => "Cannot find customer associated with message"
          ));
          exit;
        }

        $send = SMS::sendSMS($message['number']."987", $message['message']);

        // update message to sent
        if ($send['success']) {

          $message['status'] = "sent";
          Message::update($message);

        }

        // or failed
        else {

          $message['status'] = "failed";
          Message::update($message);

          // add tokens back onto customer
          Customer::addTokens($customer, $message['tokens']);

        }

        echo json_encode($send);
        exit;

      }

    }

  }
  

?>