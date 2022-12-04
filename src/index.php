<?php include("controllers/registration.submit.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../public/styles/style.css">
</head>
<body>
    <form method="post">
        <div class="container">
			<h1>Sign Up</h1>
			<p>Please fill in this form to create an account.</p>

			<label for="username"><b>Username</b></label>
			<input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>" >
			<?php if($username_error) echo "<p class='error-feedback'>$username_error</p>"; ?>

			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" >
			<?php if($email_error) echo "<p class='error-feedback'>$email_error</p>"; ?>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" >
			<?php if($password_error) echo "<p class='error-feedback'>$password_error</p>"; ?>

			<label for="phone">
				<b>Phone Number</b>
			</label>
			<br>
			
			<select name="phoneCode" value="">
				<!-- <option selected hidden value="">Code</option> -->
				<option <?php if(isset($phoneCode) && $phoneCode == "98") echo "selected"; ?> value="98">+98</option>
				<option <?php if(isset($phoneCode) && $phoneCode == "99") echo "selected"; ?> value="99">+99</option>
				<option <?php if(isset($phoneCode) && $phoneCode == "90") echo "selected"; ?> value="90">+90</option>
				<option <?php if(isset($phoneCode) && $phoneCode == "66") echo "selected"; ?> value="66">+66</option>
			</select>
			
			<input type="phone" name="phone" placeholder="812345678" value="<?php echo $phone; ?>">
			<?php if($phone_error) echo "<p class='error-feedback'>$phone_error</p>"; ?>

			<p>Login now <a href="./views/login.php" style="color:dodgerblue">here</a>.</p>

			<div class="clearfix">
				<button type="submit" class="btn">Sign Up</button>
			</div>
        </div>
      </form>
</body>
</html>