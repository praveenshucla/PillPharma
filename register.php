
	<?php
  require_once 'header.php';
		ob_start();
		session_start();
		if( isset($_SESSION['user'])!="" ){
			header("Location: home.php");
		}

		include_once 'config.php';

		$error = false;
		$nameError = $emailError = $areaError = $passError = "";

		if ( isset($_POST['btn-signup']) ) {

			// clean user inputs to prevent sql injections
			$name = trim($_POST['name']);
			$name = strip_tags($name);
			$name = htmlspecialchars($name);

			$email = trim($_POST['email']);
			$email = strip_tags($email);
			$email = htmlspecialchars($email);

			$pass = trim($_POST['pass']);
			$pass = strip_tags($pass);
			$pass = htmlspecialchars($pass);

			$area = trim($_POST['area']);
			$area = strip_tags($area);
			$area = htmlspecialchars($area);

			// basic name validation
			if (empty($name)) {
				$error = true;
				$nameError = "Please enter your full name.";
			} else if (strlen($name) < 3) {
				$error = true;
				$nameError = "Name must have atleat 3 characters.";
			} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
				$error = true;
				$nameError = "Name must contain alphabets and space.";
			}

			if (empty($area)) {
				$error = true;
				$areaError = "Please enter your area";
			} else if (strlen($area) < 3) {
				$error = true;
				$areaError = "Area must have atleat 3 characters.";
			} else if (!preg_match("/^[a-zA-Z ]+$/",$area)) {
				$error = true;
				$areaError = "Name must contain alphabets";
				
			}

			//basic email validation
			if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
				$error = true;
				$emailError = "Please enter valid email address.";
			} else {
				// check email exist or not
				$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
				$result = mysqli_query($sql,$query);
				$count = mysqli_num_rows($result);
				if($count!=0){
					$error = true;
					$emailError = "Provided Email is already in use.";
			}
			
			//password validation
			if (empty($pass)){
				$error = true;
				$passError = "Please enter password.";
			} else if(strlen($pass) < 6) {
				$error = true;
				$passError = "Password must have atleast 6 characters.";
			}
			}

			// password encrypt using SHA256();
			$password = hash('sha256', $pass);

			// if there's no error, continue to signup
			if( !$error ) {
				echo "<script>
				alert('Signup Successful');
				</script>";
				$query = "INSERT INTO users(userName,userEmail,userPass,area) VALUES('$name','$email','$password','$area')";
				$res = mysqli_query($sql,$query);

				if ($res) {
					echo "<script type=\"text/javascript\">window.location.replace('http://localhost/Pills/index.php');</script>";
				} else {
					echo "Error Signing Up";
				}

			}


		}
	?>
<h2>Sign Up</h2>
    <form method="post" action="register.php" autocomplete="off">

            	Username :&ensp;<input type="text" name="name"  placeholder="Enter Name" maxlength="50" value="<?php echo isset($_POST["name"])? $_POST["name"] : ''; ?>" />*
		<br><span class="error"><?php echo $nameError; ?></span><br>
            	Email ID :&ensp;<input type="email" name="email"  placeholder="Enter Your Email" maxlength="40" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"/>*
		<br><span class="error"> <?php echo $emailError; ?></span><br>
              	Password :&ensp;<input type="password" name="pass"  placeholder="Enter Password" maxlength="15"/>*
		<br><span class="error"><?php echo $passError; ?></span><br>
            	Area Name:&ensp;<input type="text" name="area" placeholder="Enter Area" maxlength="50" value="<?php echo isset($_POST["area"]) ? $_POST["area"] : ''; ?>" />*
		<br><span class="error"><?php echo $areaError; ?></span><br><br>
            	<button type="submit" name="btn-signup">Sign Up</button><br>
							Already Have An Account ?
            	<a href="index.php" class="glow" style="color:blue;">Sign in Here...</a>
		<p style="font-size:13px">* All fields are mandatory</p>
</table>
<?php ob_end_flush();?>
<?php require_once 'footer.php';
