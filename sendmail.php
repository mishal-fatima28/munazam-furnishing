<?php 

header('Content-type: text/plain');


use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
	$name = $_POST['username'];
	$useremail = $_POST['email'];
	$message = $_POST['message'];

	try{

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'munazamfurnishing@gmail.com';
		$mail->Password = 'dqgcegfnygwrxaiu';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = 587;


		$mail->setFrom('munazamfurnishing@gmail.com');
		$mail->addAddress('munazzamshaikh@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = 'Munazam Furnishing Query';
		$mail->Body = 'Name : ' .$name.'<br />'  . 'Email : ' .$useremail. '<br />' . "Message : " . $message;

		$mail->send();
		header("Location: contact-success.html");


	} catch(Exception $e){

		header("Location: contact-failed.html");
	}

}


 ?>