<?php // include SMTP Email Validation Class
			require_once('php-smtp-email-validation/trunk/smtp_validateEmail.class.php');
			$connect = mysqli_connect("localhost", "root", "", "PPS");
$email1 = mysqli_real_escape_string($connect, $_POST["email"]);
	$email1=stripslashes( $email1);
			// the email to validate
			$email = $email1;
			// an optional sender
			$sender = 'user@mydomain.com';
			// instantiate the class
			$SMTP_Validator = new SMTP_validateEmail();
			// turn on debugging if you want to view the SMTP transaction
			$SMTP_Validator->debug = true;
			// do the validation
			$results = $SMTP_Validator->validate(array($email), $sender);
			// view results
		  $email.' is '.($results[$email] ? 'valid' : 'invalid')."\n";

			// send email? 
			
			 
			
			if ($results[$email]) {
				  echo '<script>alert("valid")</script>';
		          
					}  
		else{
			  echo '<script>alert("not valid")</script>';
			
		}
				 			
 ?> 