<?PHP
session_start();
date_default_timezone_set("UTC");
global $config;
$json = json_decode(file_get_contents('includes/config.json'), true);
$hostname = $_SERVER['HTTP_HOST'];

$config = array();
foreach ($json['config'] as $c) {

  if (in_array($hostname, $c['hostnames'])) {
    $config = $c;
  }
  
}

// mark if loaded or not
if ($config) {
  $config['is_loaded'] = true;
} else {
  $config['is_loaded'] = false;
}

?>