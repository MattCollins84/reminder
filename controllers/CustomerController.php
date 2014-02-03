<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Cloudant.php");
  require_once("includes/Customer.php");
  require_once("controllers/Controller.php");
  require_once("includes/Email.php");

  
  Class CustomerController extends Controller {


    // create a customer
    static public function createCustomer($rest) {
      
      $data = array();
      
      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();
      
      $errors = Validation::required(array("name", "email", "password"), $vars);

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
        $res = Customer::createCustomer($vars['name'], $vars['email'], sha1($vars['password']), $vars['contact_phone'], $vars['contact_name'], 200);

        if ($res['success']) {
          $_SESSION['confirmation_email'] = $vars['email'];
          Email::confirmationEmail($vars['email'], $res['id']);
        }

        echo json_encode($res);
        exit;

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

  }
  
  

?>