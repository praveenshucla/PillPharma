
<?php
require_once 'header.php';
	ob_start();
	session_start();
	require_once 'config.php';

$shopname = $_GET['shopname'];

$list = "select * from area where shopname='{$shopname}'";

$res = mysqli_query($sql,$list);

if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
      $sid = $row['shopname'];
      echo '<h2>Shop List</h2><br><br>';
      echo "<p>[This Is The List Of Shops Relating To Your Query]</p>";
      echo "<br><b>Shopname:</b>&ensp; " .$row['shopname']. "<br> <b>Area Name:&ensp;</b> " .$row['areaname']. "<br><br><a href='/Pills/admin/inventory/inventory.php?shop=".$sid."' class='glow'>Click Here</a> To Go To This Shop's Inventory<br><br> ";
}
}
else
{
echo "<h3>0 results for the entered shop name</h3>";
}
require_once 'footer.php';
?>
</body>
</html>
