<?php

// include SMTP Email Validation Class
require_once('smtp_validateEmail.class.php');

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);error_reporting(0);
// the email to validate
$email = 'sadas@rrtr0rr12.com';
// an optional sender
$sender = 'user@mydomain.com';
// instantiate the class
$SMTP_Validator = new SMTP_validateEmail();
// turn on debugging if you want to view the SMTP transaction
$SMTP_Validator->debug = true;
// do the validation
$results = @$SMTP_Validator->validate(array($email), $sender);
// view results
  $email.' is '.($results[$email] ? 'valid' : 'invalid')."\n";

// send email? 
if ($results[$email]) {
   echo '<script>alert("valid")</script>';
} else {
  echo 'The email addresses you entered is not valid';
}


?>
