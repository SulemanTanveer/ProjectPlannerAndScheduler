   <?php
   $connect = mysqli_connect("localhost", "root", "", "PPS");
	 
 error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    $email1 = mysqli_real_escape_string($connect, $_POST["email"]);
	$email1=stripslashes( $email1);
   	$query222 = "SELECT* from employee  WHERE email='$email1'";
	$result222=mysqli_query($connect, $query222);
	if(mysqli_num_rows($result222)==1){
 

			
			  
	 $row222=mysqli_fetch_array($result222);
		$email1=$row222['email'];
		$empName=$row222['empName'];
         $empId=$row222['empId'];
   
   function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
	
	$pswd=randomPassword();
	$password=md5($pswd);
	
	$query = "  UPDATE employee SET password='$password'  WHERE empId='$empId'";  
	mysqli_query($connect, $query);
	
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'pps.fyp@gmail.com';          // SMTP username
$mail->Password = '090078601'; 					// SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('pps.fyp@gmail.com', 'Project Planner & Scheduler');
$mail->addReplyTo('pps.fyp@gmail.com', 'Project Planner & Scheduler');
$mail->addAddress($email1);   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML

$bodyContent='';
$bodyContent = "Dear " . $empName .",<br>Your new password is: <b>" . $pswd ."</b><br>"."Thanks!";

$mail->Subject = 'Recover Password.';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Sorry, Email has not been send.<br>Pleasr Try Again..! ';
     
} else {
    echo 'New Password has been sent to your email address..! ';
	
}
			 
	} 
	
	 else{
		 
		 echo 'Sorry, This email does not exist in our record. ';
	 }
	
	 
	
	
	
	
	
	
	
		?>