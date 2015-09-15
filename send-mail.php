<?php
/**	
 *	A PHP based mail sender function
 *	Takes Name, Email, Message as input to the contact form
 *	By Pranay Sarkar
 **/
 
	// site owner info
	$email_to = 'pranaysarkar22@gmail.com';
	$success_message = "You have successfully sent message!";
	$site_name = 'pranay22.github.io';

	// contact form fields (Inputs to be configured accordingly)
	$name = trim( $_POST['name'] );
	$email = trim( $_POST['email'] );
	$message = trim( $_POST['message'] );
	$submitted = $_POST['submitted'];

	// contact form submitted
	if ( isset( $submitted ) ){
		// check for error
		if ( $name === '' ){
			$name_empty = true;
			$error = true;
		}
		elseif ( $email === '' ){
			$email_empty = true;
			$error = true;
		}
		elseif ($message === ''){
			$message_empty = true;
			$error = true;
		}
		// end check for error

		// error
		if ( isset( $error ) ){
			echo '<div class="alert alert-error contact-alert"><strong>Failure while sending Email!</strong><ul>';
			if ($name_empty)
				echo '<li>Invalid Name</li>';
			elseif ($email_empty)
				echo '<li>No Email Given</li>';
			elseif ($email_unvalid)
				echo '<li>Invalid Email ID</li>';
			elseif ($message_empty)
				echo '<li>Write something as message!</li>';
			else
				echo '<li>An error occurred while sending message. Please try again later.</li>';
			echo "</ul></div>";
		}
		// end error

		// no error - send mail
		if ( ! isset($error) ){
			$subject = 'Contact form message from your ' . $site_name . ' site';
			$body = "Имя: $name \n\nEmail: $email \n\nMessage: $message";
			$headers = 'От: ' . $name . ' <' . $email . '> ' . "\r\n" . 'Ответить: ' . $email;
			mail( $email_to, $subject, $body, $headers );
			echo '<div class="alert alert-success contact-alert"><strong>УСПЕХ! </strong>' . $success_message . '</div>';
		}
		// end no error - send mail
	}
	// end contact form submitted
?>