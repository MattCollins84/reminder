<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("controllers/Controller.php");
  require_once("includes/Email.php");
  require_once("includes/Tools.php");

  
  Class CustomerController extends Controller {


    // create a customer
    static public function createCustomer($rest) {
      
      global $config;

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("country", "name", "email", "password"), $vars);

      // timezone for USA
      if ($vars['country'] == "us" && !$vars['timezone']) {
        $errors[] = "timezone";
      }

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));
        exit;

      }

      else {

        if (strlen($vars['password']) < 8) {
          echo json_encode(array(
            "success" => false,
            "error" => "Password is too short"
          ));
          exit;
        }

        if ($vars['password'] != $vars['password2']) {
          echo json_encode(array(
            "success" => false,
            "error" => "Passwords do not match"
          ));
          exit;
        }

        // create the customer
        $res = Customer::createCustomer($vars['name'], $vars['email'], sha1($vars['password']), $vars['country'], $vars['contact_phone'], $vars['contact_name'], $config['tokens']['complimentary'], $vars['timezone']);

        if ($res['success']) {
          $_SESSION['confirmation_email'] = $vars['email'];
          $res['email'] = Email::confirmationEmail($vars['email'], $res['id']);
        }

        echo json_encode($res);
        exit;

      }
        
    }

    // update a customer
    static public function updateCustomer($rest) {
      
      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("name", "email"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));
        exit;

      }

      else {

        if (Validation::email($vars['email']) === false) {
          echo json_encode(array(
            "success" => false,
            "error" => "Invalid email address"
          ));
          exit;
        }

        // are we changing passwords?
        if ($vars['password'] != "" && strlen($vars['password']) < 8) {
          echo json_encode(array(
            "success" => false,
            "error" => "New password is too short"
          ));
          exit;
        }

        if ($vars['password'] != "" && $vars['password'] != $vars['password2']) {
          echo json_encode(array(
            "success" => false,
            "error" => "New passwords do not match"
          ));
          exit;
        }

        $customer = Customer::getActiveCustomer();

        $customer['name'] = $vars['name'];
        $customer['email'] = $vars['email'];
        $customer['contact_phone'] = $vars['contact_phone'];
        $customer['contact_name'] = $vars['contact_name'];

        if ($vars['password']) {
          $customer['password'] = sha1($vars['password']);
        }

        // update
        $update = Customer::updateCustomer($customer);
        
        if ($update['success']) {
          // make sure latest revision is in session
          $_SESSION['customer'] = Customer::getById($customer['_id']);
          $_SESSION['account_changed'] = true;
          echo json_encode(array(
            "success" => true
          ));
          exit;
        }
        
        else {
          echo json_encode(array(
            "success" => false,
            "error" => "Unable to update customer"
          ));
          exit;
        }
      }
        
    }

    // get a customer by id
    static public function getCustomerById($rest) {

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

        $customer = Customer::getById($vars['id']);

        $res = array(
          "success" => true
        );

        if ($customer) {
          $res['customer'] = $customer;
        } else {
          $res['msg'] = "No customer found";
        }

        echo json_encode($res);

      }

    }

    // get a customer by email
    static public function getCustomerByEmail($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("email"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        $customer = Customer::getByEmail($vars['email']);

        $res = array(
          "success" => true
        );

        if ($customer) {
          $res['customer'] = $customer;
        } else {
          $res['msg'] = "No customer found";
        }

        echo json_encode($res);

      }     

    }

    // add tokens
    static public function addTokens($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("id","tokens"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        $customer = Customer::getById($vars['id']);

        if (!$customer) {

          echo json_encode(array(
            "success" => false,
            "error" => "Customer not found"
          ));

        }

        else {

          $add = Customer::addTokens($customer, $vars['tokens']);

          $res = array(
            "success" => $add['ok']
          );

          if ($add['ok']) {
            $res['customer'] = $add['customer'];
          }

          echo json_encode($res);

        }

          

      } 

    }

    // remove tokens
    static public function removeTokens($rest) {

      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("id","tokens"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));

      }

      else {

        $customer = Customer::getById($vars['id']);

        if (!$customer) {

          echo json_encode(array(
            "success" => false,
            "error" => "Customer not found"
          ));

        }

        else {

          $remove = Customer::removeTokens($customer, $vars['tokens']);

          $res = array(
            "success" => $add['ok']
          );

          if ($remove['ok']) {
            $res['customer'] = $remove['customer'];
          }

          echo json_encode($res);

        }

          

      } 

    }

    static public function renderConfirmation($rest) {

      $data = array();
      $data['hide_menu'] = true;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['customer'] = Customer::getById($h[1]);

      // if we failed to get a customer, show fail page
      if (!$data['customer']) {
        echo View::renderView("confirmation_fail", $data);
      }

      // otherwise, mark as verified
      else {

        $data['customer']['verified'] = true;
        Customer::updateCustomer($data['customer']);
        
        $data['customer'] = Customer::getById($h[1]);

        echo View::renderView("confirmation", $data);

      }

      

    }

    static public function forgotPassword($rest) {

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("email"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));
        exit;

      }

      $customer = Customer::getByEmail($vars['email']);

      if (!$customer) {
        echo json_encode(array(
          "success" => false,
          "error" => "Email address is not in our system"
        ));
        exit;
      }

      $new = Tools::randomString();

      $customer['password'] = sha1($new);

      // update
      $update = Customer::updateCustomer($customer);
      
      if ($update['success']) {

        $email =Email::forgotEmail($vars['email'], $new);

        echo json_encode(array(
          "success" => true,
          "password" => $new,
          "email" => $email
        ));
        exit;

      }
      
      else {
        echo json_encode(array(
          "success" => false,
          "error" => "Unable to reset customer password, please try again"
        ));
        exit;
      }

    }

    static public function sendVerificationEmail($rest) {

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("email", "id"), $vars);

      // do we have any errors
      if (count($errors)) {

        echo json_encode(array(
          "success" => false,
          "error" => "Missing the following fields: ".implode($errors, ", ")
        ));
        exit;

      }

      $email = Email::confirmationEmail($vars['email'], $vars['id']);

      echo json_encode(array("success" => $email));
      exit;

    }

  }
  
  

?>