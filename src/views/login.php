<?php include("../controllers/login.submit.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="../../public/styles/style.css">
</head>
<body>
    <form method="post">
        <div class="container">
			<h1>Login</h1>
			<p>Please fill in this form to login.</p>

			<label for="username"><b>Username</b></label>
			<input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>" >
			<?php if($username_error) echo "<p class='error-feedback'>$username_error</p>"; ?>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" >
			<?php if($password_error) echo "<p class='error-feedback'>$password_error</p>"; ?>

			<label for="phone">
				<b>Phone Number</b>
			</label>
			<br>

			<p>Create new account <a href="../index.php" style="color:dodgerblue">here</a>.</p>

			<div class="clearfix">
				<button type="submit" class="btn">Login</button>
			</div>
        </div>
      </form>
</body>
</html>