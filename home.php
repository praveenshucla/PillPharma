<?php
	ob_start();
	session_start();
	require_once 'header.php';
	require_once 'config.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($sql,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>
	<h2>Hi' <?php echo $userRow['userName']; ?></h2>
	[&ensp;USER ID:&ensp; <?php echo $userRow['userId']; ?>&ensp;|&ensp;
	AREA:&ensp; <?php echo $userRow['area']; ?>&ensp;]

	<p></p>

	<b>Here Are Somethings You Can Do On This Site</b><br>
	<br>
	Search For A Pill<br><br>

	<form method="get" action="search.php" autocomplete="off">
Enter Query:&ensp; <input type="text" name="pillname" placeholder="Pill Name" value="" maxlength="40" /><br><br><br>
						&ensp;&ensp;&ensp;<button type="submit" class="button glow-button">Search</button><br><br>

	<a href="area.php" class="glow">View Shops In Your Area</a><br>
	<br>
	<a href="recent.php?userid=<?php echo $userRow['userId']; ?>" class="glow">Recently Searched Pills</a><br>
	<br>
	<br>
	<a href="logout.php?logout" class="glow">Sign Out</a>

<?php require_once 'footer.php'; ?>
<?php ob_end_flush(); ?>
