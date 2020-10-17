<?php
session_start();
include_once ('operations.php');
include_once ('connection.php');

$con = new DBConnector();
$pdo = $con->connectToDB();
if (isset($_SESSION['email']))
{
	$stmt=$pdo->prepare("SELECT * FROM users WHERE Email = ?");
        $stmt->execute([$_SESSION['email']]);
        $row = $stmt->fetch();
        $_SESSION['user'] = $row['Username'];
        $_SESSION['residency'] = $row['Residency'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['profilepic'] = $row['ProfilePic'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="profile-card">
	<div class="image-container">
		<img src = "asset/<?php echo $_SESSION['profilepic']?>" width="70%" height="300" >
		<div class="title">
			<h2>Username : <?php echo $_SESSION['user'];?></h2>

			<p><i class="fa fa-home" ></i> <?php echo @$_SESSION['residency'];?> </p>
		<p><i class="fa fa-envelope-o" ></i> <?php echo $_SESSION['email']; ?> </p>
	</div>
</div>

		
		<p><b></b></p>
		<a class="btn btn-light"href="password.php">Change Password</a>
		<a class="btn btn-light"href="logout.php">Logout</a>
		<br>
		<br>
	</div>
</body>
</html>
