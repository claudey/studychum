<?php
	echo "print on page";
	
	require_once 'google/appengine/api/mail/Message.php';
	use google\appengine\api\mail\Message;

	$message_body = "You have been sent a chum request.";

	$mail_options = [
		"sender" => "studychumgh@gmail.com",
		"to" => "osborn@meltwater.org",
		"subject" => "You have received a chum request",
		"textBody" => $message_body
	];

	try {
	    $message = new Message($mail_options);
	    $message->send();
	} catch (InvalidArgumentException $e) {
	    echo $e;
	}

?>