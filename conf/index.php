<?php
require_once('./PHPMailerAutoload.php');

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Set the CharSet encoding
		$mail->CharSet = 'UTF-8';
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = '465';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = 'true';
		$mail->SMTPSecure = 'ssl'; 
		//Username to use for SMTP authentication
		$mail->Username = 'diexmnt@gmail.com';
		//Password to use for SMTP authentication
		$mail->Password = 'darexmobile1';
		//Set who the message is to be sent from
		$mail->setFrom('diexmnt@gmail', 'Diex Systems');
		//Set an alternative reply-to address
		$mail->addReplyTo('diexmnt@gmail', 'Diex Systems');
		//Set who the message is to be sent to
		
			$mail->addAddress('davidinyang01@gmail.com');
		
		//Set the subject line
		$mail->Subject = 'test email';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML('hi, this is a test email');

		//send the message, check for errors
		if(!$mail->send()) {
			// Return the error in the Browser's console
			echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		
		?>