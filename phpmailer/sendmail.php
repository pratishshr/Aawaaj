<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Aawaaj/phpmailer/PHPMailerAutoload.php");
class SendMail{
	public $key;
	public $email;

	public function generateKey($email){
		
		$this->email= $email;
		$myKey = md5($email);
		$this->key = $myKey;
		return $myKey;
	}
	public function send($firstName,$lastName){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTPAuth
		$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'aawaaj@hotmail.com';                 // SMTP username
		$mail->Password = '12Aaw@@j12';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 25;                                    // TCP port to connect to

		$mail->From = 'aawaaj@hotmail.com';
		$mail->FromName = 'Aawaaj';
		$mail->addAddress($this->email, $firstName." ".$lastName);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Aawaaj Activation Code';
$mail->Body    = "Hello {$firstName} {$lastName},<br/>Your Activation Key is <a href=\"http://localhost/Aawaaj/app/controller/signupconfirmcontroller.php?user={$firstName}&id={$this->key}\">Here</a>";
//$mail->AltBody = "Click on the given link to activate: ";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
   
} else {
    echo 'Message has been sent';
   
}

	}
	public function sendToOrg($firstName,$lastName,$huser){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTPAuth
		$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'aawaaj@hotmail.com';                 // SMTP username
		$mail->Password = '12Aaw@@j12';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 25;                                    // TCP port to connect to

		$mail->From = 'aawaaj@hotmail.com';
		$mail->FromName = 'Aawaaj';
		$mail->addAddress($this->email, $firstName." ".$lastName);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Volunteer Application';
$mail->Body    = "Hello, {$firstName} {$lastName}, would like to apply to volunteer for you project. <br/>Click <a href=\"http://localhost/Aawaaj/profile/index.php?id={$huser}\">here</a> to view the profile of applicant. Thank You!";
//$mail->AltBody = "Click on the given link to activate: ";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
   
} else {
    
   
}

	}

}


$sendmail = new SendMail();
?>