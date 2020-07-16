<?php
	$sql = new mysqli('localhost', 'root', '', 'Pills');
	ob_start();
	session_start();
	require_once 'header.php';
	require_once 'config.php';

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}

	$error = false;
	$emailError= $passError= "";
	if( isset($_POST['btn-login']) ) {

		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($_POST['email'])){
			$error = true;
			$emailError = "Please enter your email address.";

		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
			
		}

		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}


		// if there's no error, continue to login
		if (!$error) {

			$password = hash('sha256', $pass); // password hashing using SHA256

			$res=mysqli_query($sql,"SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} 
			else {
				
				$errMSG = "Incorrect Credentials, Try again...";
			}

		}

	}
?>
<h2>Log In</h2>
<form method="post" action="index.php" autocomplete="off">

           <?php
			if ( isset($errMSG) ) {

				?>
				 <?php echo "Error:" .$errMSG. "!"; ?>

                <?php
			}
			?>
<br>

            	Email ID:&ensp;<input type="text" name="email" placeholder="Your Email" maxlength="40" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
		<br><span class="error"><?php echo $emailError; ?></span><br>
            	Password:&ensp;<input type="password" name="pass" placeholder="Your Password" maxlength="15" value="<?php echo isset($_POST["pass"]) ? $_POST["pass"] : ''; ?>"/>
		<br><span class="error"><?php echo $passError; ?></span><br><br>
              <button type="submit" name="btn-login">Sign In</button>
							<br><br>

            <a href="register.php" class="glow">Sign Up Here...</a>
<?php ob_end_flush(); ?>
