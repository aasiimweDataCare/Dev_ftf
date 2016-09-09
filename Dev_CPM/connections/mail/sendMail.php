<?php
set_time_limit(3600);

require_once(dirname(__FILE__).'/PHPMailer_5.2.4/class.phpmailer.php');

#Relay email from CPM Server
function send_emailCPMServer($to,$subject,$msg,$header){
	/***************************
	 ** username:mis@ftfcpm.com
	**  smtp Host:192.168.5.17
	*************************/

	$mail = new PHPMailer(); // create a new object
	$mail->Timeout = 100;  
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail ssl for gmail
	$mail->Host = "192.168.5.17";
	$mail->Port = 252; // 
	$mail->IsHTML(true);
	$mail->Username = "mis@ftfcpm.com";
	$mail->Password = "1Datacare23";
	$mail->SetFrom($header);
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$sendMail = $mail->Send();
	$errorMessage = $mail->ErrorInfo;

	return ($sendMail);
}
#Relay email from Gmail Server
function send_emailGmail($to,$subject,$msg,$header){

	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "ftfcpm.mis@gmail.com";
	$mail->Password = "cpmmisV1";
	$mail->SetFrom($header);
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$sendMail = $mail->Send();
	$errorMessage = $mail->ErrorInfo;
	//mis@ftfcpm.com
	//192 168 5 17
	//....
	return ($sendMail);
}
#Relay mail from  DCARE server.
function send_email($to,$subject,$msg,$header){
	/***************************
	 ** username:mis.ftfcpm@dcareug.com
	**  smtp Host:mail.dcreug.com
	*************************/

	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail ssl for gmail
	$mail->Host = "mail.dcareug.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "mis.ftfcpm@dcareug.com";
	$mail->Password = "1Misftfcpm23";
	$mail->SetFrom($header);
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$sendMail = $mail->Send();
	$errorMessage = $mail->ErrorInfo;

	return ($sendMail);
}


/* 
//uncomment this section only if u want to test mail sending functionlity
$to='aasiimwe@dcareug.com';
$subject='Hello World';
$message='Test message for mail functionality from CPMServer';
$headers='mis@ftfcpm.com';

$query=@send_email($to,$subject,$message, $headers);
 */
?>
