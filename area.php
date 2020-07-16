<?php require_once 'header.php'; ?>
	<h2>Shops In Your Area</h2>
<?php
	require_once 'usersession.php';

$uarea = $userRow['area'];

$array = array();
// run query
$shops = mysqli_query($sql,"SELECT shopname FROM area where areaname='$uarea'") or die ("no query");

if ($shops->num_rows > 0) {
    // output data of each row
    while($row = $shops->fetch_assoc()) {
      $a = $row["shopname"];
        echo '[&ensp;<b>These Are The Shops In Your Area Click On Them To Check Their Inventory</b>&ensp;]<p></p>';
        echo "<a href='http://localhost/Pills/shop.php?shopname=".$a."' class='glow'> ".$a." </a><br>";
    }
} else {
    echo "0 results";
  }
require_once 'footer.php';
?>
