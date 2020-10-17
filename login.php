<?php if(!isset($_SESSION)) {session_start();} ?>
<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
	<div class="login-box">
	<div class="row">
			<div class=" login-left m-auto">

				<h2 style="color: black">Login</h2>


				<form action="register.php" method="post">
					<p style="color:green"><?php if(isset($_SESSION['err'])) {echo $_SESSION['err'];unset($_SESSION['err']);} ?></p>
					<p style="color:tomato"><?php if(isset($_SESSION['error'])) {echo $_SESSION['error'];unset($_SESSION['error']);} ?></p>
			<div class="form-group">

				<label>Email Address:</label>
			    <input type="email" name="mail" class="form-control" required>
			</div>


			<div class="form-group">

				<label>Password:</label>
			    <input type="password" name="pass" class="form-control" required>
			</div>

			<button class="btn btn-outline-dark" type="Submit" name="login">Login</button>

			<p>Don't have an account? <a href="registration.php" >Sign up now</a>.</p>

			</form>
		</div>



		</div>


		</div>
	</div>
	</div>
	</div>
</body>
</html>
