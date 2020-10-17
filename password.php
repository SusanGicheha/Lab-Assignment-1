<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	<div class="login-box">
	<div class="row">
		<div class="col-md-6 login-right m-auto">

				<h2 style="color: black">Reset Password </h2>
	<form action="register.php" method="POST">		
			<div class="form-group">
				
				<label>Current Password:</label>
			    <input type="password" name="username" class="form-control"   required>
			</div>
			
				
			<div class="form-group">
				
				<label>New Password:</label>
			    <input type="password" name="pword" class="form-control" required>
			</div>
			<button class="btn btn-light" type="Submit" name="change">Change Password</button>
			<a class="btn btn-light"href="home.php">Cancel</a>
		</form>
</body>
</html>