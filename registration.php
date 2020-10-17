<?php if(!isset($_SESSION)) {session_start();} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</head>
<body>

	<div class="container">
	<div class="login-box">
	<div class="row">
		<div class=" login-right m-auto">

				<h2 style="color: black">Register</h2>

			<form action="register.php" method="POST" enctype="multipart/form-data">
				<p style="color:tomato"><?php if(isset($_SESSION['err'])) {echo $_SESSION['err'];unset($_SESSION['err']);} ?></p>
			<div class="form-group">

				<label>Username:</label>
			    <input type="text" name="username" class="form-control"   required>
			</div>


			<div class="form-group">

				<label>Password:</label>
			    <input type="password" name="pword" class="form-control" required>
			</div>



			<div class="form-group">

				<label>Email:</label>
			    <input type="email" name="mail" class="form-control"  required>
			</div>

			<div class="form-group">
				<label>Residency (city):</label>
				  <input type="text" name="residency" class="form-control"   required>

			</div>
			<div>
	<label>Image: </label>
		<input type="file" name="image" required="true" class="form-control"><br>
			</div>
			<button class="btn btn-light" type="Submit" name="save">Register</button>
<br><br>
			<p>Already have an account? <a href="login.php">Login now</a>.</p>
</form>


</div>
</div>
</div>
</div>

</body>
</html>
