<?php
	// - This file doesn't work in school, but will work from home
	//   or from the Heroku server (See docs in Omnivox)
	// - This file requires to download PHPMailer
	//   https://github.com/PHPMailer/PHPMailer

require_once("PHPMailer/PHPMailerAutoload.php");

function send_email($to, $subject, $body) 
{ 
	global $error;
	$mail = new PHPMailer();  // create a new object

	// USE YOUR OWN CREDENTIAL BELOW...
	// - If you are going to put this file on github,
	//   you should create yourself a dummy email address at gmail
	// - You will need to verify by sms your email to be able to
	//   use Gmail's SMTP server
	$from_name = "Your Name";
	$mail->Username = "youremail@gmail.com";  
	$mail->Password = "yourpassword";           

	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->SetFrom($mail->Username, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);


	if(!$mail->Send()) 
	{
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} 
	else 
	{
		$error = 'Message sent!';
		return true;
	}
}

?>