<?php
session_start();
$name=$_POST['regname'];
$email=$_POST['regemail'];
//$dob=$_POST['dob'];
$password=$_POST['regpass'];
if(isset($_POST['submit'])){

	$otp=rand(1000,9999);
	$from="YunikBank2028.com";
	$to= $email;
	$subject="OTP";
	$message = "Your OTP is ".$otp;

	$headers = "From: $from \r\n";
	$headers .= "Reply-To: $from\r\n";
	$headers .= "Return-Path: $from\r\n";
	$headers .= "X-Mailer: PHP \r\n";

	if(mail($to,$subject,$message,$headers))
	{
		$_SESSION['firstname']=$name;
		$_SESSION['email']=$email;
		$_SESSION['pass']=$password;
		$_SESSION['otp']=$otp;
		header('location: otpverification.php');
	}
	else
	{
 	   echo "Error in sending OTP";
	}
 }
?>
