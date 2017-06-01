<?php

$my_email = "info@iccste.com";

$name=$_POST['Name'];
$email=$_POST['Email'];
$message=$_POST['Message'];
$subject=$_POST['Subject'];
$headers = "From: " . $_POST['Email'];
$captcha = false;

// check if not robot
if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
	$captcha = true;
	$secret = '6LcbTP8SAAAAALJjrX0GVljdk6ASyPooBQ5_Cnj1';
	//get verify response data
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);
	if(!($responseData->success))
		$errors[] = 'We could not verify your CAPTCHA entry. Please try again.';
	else 
		mail($my_email,$subject,$message,$headers);
}

?>

---
layout: default
title: ICCSTE'16 - Contact Us
---

<div class="unit unit-s-1 unit-m-1-4-1 unit-l-1-4-1">
  <div class="unit-spacer content">
    <p class="body">We have received your message and we will try our best to get back to you within the next 48 hours.<br>
    Thank you for your interest in ICCSTE'16.</p>

  </div>
  </div>