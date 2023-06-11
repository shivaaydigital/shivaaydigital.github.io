<?php

// Get Message Details
$alert = "New Message - Contact Form";
$name =  "Name: " . $_POST['name'];
$email =  "Email: " . $_POST['email'];
$phone =  "Phone: " . $_POST['phone'];
$subject =  "Subject: " . $_POST['subject'];
$message =  "Message: " . $_POST['message'];

// Test Message Details
// $alert = "NEW MESSAGE";
// $name =  "Name: " . "Crytomag";
// $email =  "Email: " . "Test";
// $message =  "Message: " . "Test";

$final_message = $alert . "\n" . $name . "\n" . $email . "\n" . $phone . "\n" . $message;

$url = "https://api.telegram.org/bot5897503467:AAEH3z4XUP2KmDjnxpVh8o-QN69WIIsdCJg/sendMessage?chat_id=6137503985&text=" . urlencode($final_message);
// echo $url;

// Send Request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_exec($ch);
curl_close($ch);


echo "<script>window.location.href = 'https://shivaaycreations.in/messagesent';</script>";
