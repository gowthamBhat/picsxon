<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../../styles/auth.css">
</head>

<body>
	<div class="header">
		<h2>User Register</h2>
	</div>

	<form name="myForm" method="post" action="register.php" onsubmit="return validationForm()">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
			<a href="../../index.html"><button type="button" class="btn" name="login_user">Go back</button></a>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
	<script>
		function validationForm() {
			let username = document.forms["myForm"]["username"].value;
			if (username == "") {
				alert("Name must be filled out");
				return false;
			}
			let password1 = document.forms["myForm"]["password1"].value;
			if (password1 == "") {
				alert("password must be filled out");
				return false;
			}
			if (password1.length < 6) {
				alert("password must be 6 letters long");
				return false;
			}
			let password2 = document.forms["myForm"]["password2"].value;
			if (password2 == "") {
				alert("password must be filled out");
				return false;
			}
			let email = document.forms["myForm"]["email"].value;
			if (email == "") {
				alert("email must be filled out");
				return false;
			}
		}
	</script>
</body>

</html>