<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'info@wyobi.com'; // put your email
$email_subject = "Contact form submitted by:  $name";
$email_body = "You have received a new message. \n\n".
				  " Here are the details:\n \nName: $name \n ".
				  "Email: $email_address\n Message \n $message";
$headers = "From: admin@wyobi.com" . " " .
"Reply-To: $email_address" . " " .
"X-Mailer: PHP/" . phpversion();

mail($to,$email_subject,$email_body,$headers);
return true;			
?>