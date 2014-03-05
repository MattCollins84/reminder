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
      
      global $config;

      $data = array();
      $data['tokens'] = $config['tokens'];

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("contact_id", "message", "date", "country", "type"), $vars);

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
        if ($data['tokens'][$vars['type']] && (int) $customer['available_tokens'] < (int) $data['tokens'][$vars['type']]) {

          echo json_encode(array(
            "success" => false,
            "error" => "Not enough available tokens"
          ));
          exit;

        }

        switch($vars['type']) {

          case "fixed":
            $tokens = $data['tokens']['fixed'];
            break;

          case "custom":
            $tokens = $data['tokens']['custom'];
            $len = strlen($vars['message']);
            $tokens = ceil($len / 160) * $tokens;
            break;

        }

        // create the message
        $message = Message::createMessage($contact, $vars['message'], $vars['date'], $vars['time'], $tokens, $vars['country'], $vars['type'], $customer['timezone']);

        // if we're successful, remove these tokens
        if ($message['success']) {
          Customer::removeTokens($customer, $tokens);
          $_SESSION['customer'] = Customer::getById($customer['_id']);
          $_SESSION['message_scheduled'] = true;
        }

        $optout = "reply STOP to unsubscribe";

        // create a template?
        if ($vars['template'] == "true") {

          $storeDate = ($vars['template_date']!="false"?$vars['template_date']:false);

          $template = Message::createTemplate($customer['_id'], $vars['template_name'], trim(str_replace($optout, "", $vars['message'])), $storeDate);

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

    // unschedule message
    static public function unscheduleMessage($rest) {

      $data = array();
      $data['active_customer'] = Customer::getActiveCustomer();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $message = Message::getById($h[1]);

      if (!$message) {
        return array(
          "success" => false,
          "error" => "Cannot find message"
        );
      }

      if ($message['customer_id'] != $data['active_customer']['_id']) {
        return array(
          "success" => false,
          "error" => "Message does not belong to customer"
        );
      }

      $message['status'] = "unscheduled";

      $update = Message::update($message);

      if ($update['success']) {
        Customer::addTokens($data['active_customer'], $message['tokens']);
        $_SESSION['customer'] = Customer::getById($data['active_customer']['_id']);
      }

      echo json_encode($update);

    }

  }
  

?>