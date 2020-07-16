
<?php
ob_start();
require_once 'header.php';
require_once 'config.php';
    session_start();


    if ( isset($_POST['submitshop']) ) {

      $areaname = trim($_POST['areaname']);
      $areaname = strip_tags($areaname);
      $areaname = htmlspecialchars($areaname);

$array = array();
// run query
$shops = mysqli_query($sql,"SELECT shopname FROM area where areaname='$areaname'") or die ("no query");

if ($shops->num_rows > 0) {
    // output data of each row
    while($row = $shops->fetch_assoc()) {
      $array[] = $row["shopname"];


    }
} else {
    echo "0 results";
  }

  foreach ($array as &$sid) {
    echo "Add Pill To Shop <a href='http://localhost/Pills/admin/addpill/shop.php?shop=".$sid."' class='glow'> ".$sid."</a><br><br>";
  }

}
else {
  echo '<h2 class="">Add A Pill To Shop</h2>
    <form method="post" action="/Pills/Admin/addpill/index.php" autocomplete="off">

              Area Name :&ensp;<input type="text" name="areaname"  placeholder="Enter Area Name" maxlength="50" value="" /><br><br><br>
              <button type="submit" name="submitshop">Submit</button><br>
';
}
?>
<?php require_once 'footer.php'; ?>
