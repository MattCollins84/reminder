<?

Class Tools {

  // turn Y-M-D date into country specific
  static public function dateFormat($date, $country="gb") {

    list($y, $m, $d) = explode("-", $date);

    switch($country) {

      case "gb":
        $date = $d."/".$m."/".$y;
        break;

      case "us":
        $date = $m."/".$d."/".$y;
        break;

    }

    return $date;

  }

  static public function randomString($length=8) {

    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    return substr(str_shuffle($str), 0, $length);

  }

}

?>