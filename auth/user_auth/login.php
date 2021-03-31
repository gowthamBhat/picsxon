<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../../styles/auth.css">
</head>

<body>
	<div class="header">
		<h2>User Login</h2>
	</div>

	<form name="myForm" method="post" action="login.php" onsubmit="return formValidation()">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<script>
		function formValidation(x) {

			var x = document.forms["myForm"]["username"].value;
			if (x == "") {
				alert("Name must be filled out");
				return false;
			}
			var y = document.forms["myForm"]["password"].value;
			if (y == "") {
				alert("password must be filled out");
				return false;
			}
		}
	</script>
</body>

</html>