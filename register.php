<?php

include_once 'connection.php';
include_once 'operations.php';
if(!isset($_SESSION)) {session_start();}
$con = new DBConnector();
$pdo = $con->connectToDB();


if(isset($_POST["save"]))
{
	$Username = $_POST["username"];
	$Password = $_POST["pword"];
	$Email = $_POST["mail"];
	$Residency = $_POST["residency"];
	$ProfilePic=$_FILES['image'];

	$user = new User();
	$user->setUserName($Username);
	$user->setPassword($Password);
	$user->setEmail($Email);
	$user->setResidency($Residency);
	$user->setProfilePic($ProfilePic);
//echo  $user->register($pdo);
	if($user->register($pdo)=="successful")
	{
		$_SESSION['success'] = "Registration Complete, Proceed to login";
		echo (@$_SESSION['success']);
		$_SESSION['err']="Registration successful! Enter your credentials to login";
		header("location:login.php");
	}
	else
	{
		echo " Registration Failed, Try Again";
		$_SESSION['err']="Registration Failed, Try Again";
		header("location: registration.php");
	}



}

if (isset($_POST['login']))
{
	$Email = $_POST['mail'];
	$Password= $_POST['pass'];
	$user = new User();
	$user->setEmail($Email);
	$user->setPassword($Password);

	  if($user->login($pdo)=="success"){
			$_SESSION['email'] = $Email;
			$login_details = $user->login($pdo);
			//$_SESSION['user'] = $login_details['Username'];
			header("location: home.php");
		} else {
			$_SESSION['error']="Incorrect email or password";
			header("location:login.php");
		}
}


?>
