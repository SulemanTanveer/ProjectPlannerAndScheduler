<?php

 
// include SMTP Email Validation Class
require_once('../php-smtp-email-validation/trunk/smtp_validateEmail.class.php');

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(0);
$email=$_POST['email'];

// the email to validate
 
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
   echo 'yes';
} else {
  echo 'no';
}


?>
