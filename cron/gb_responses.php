<?
  require_once("includes/config.php");
  require_once("includes/SMS.php");
  require_once("includes/Contact.php");

  $messages = SMS::getLogs();

  foreach ($messages as $message) {

    if (strtolower($message['body']) != "stop") {
      continue;
    }

    $number = substr(preg_replace("/[^0-9]+/", '', $message['number']), -9);

    $contacts = Contact::getByNumber($number);

    foreach ($contacts as $contact) {

      $contact['stop'] = true;

      $update = Contact::updateContact($contact);

    }

  }

?>