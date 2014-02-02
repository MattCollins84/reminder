<?
class Validation {
  
  // check required fields
  static public function required($required, $submitted) {

      $missing = array();

      // for each field
      foreach ($required as $req) {

        if (!isset($submitted[$req]) || !$submitted[$req]) {
          $missing[] = $req;
        }
        
      }

      return $missing;
  }

  // validate email
  static public function email($email) {

    return filter_var($email, FILTER_VALIDATE_EMAIL);

  }

}
?>