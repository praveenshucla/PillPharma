<?php
require_once 'header.php';
require_once 'config.php';

$shop = $_GET['shop'];

$drop = "drop table {$shop}";
$res = mysqli_query($sql,$drop);

if($res)
  {
    $delarea = "delete from area where shopname='$shop'";
    $delshop = "delete from shoplist where shopname='$shop'";
    mysqli_query($sql,$delarea);
    mysqli_query($sql,$delshop);
    echo "<h2>Shop " .$shop. " Has Been Deleted Successfully !</h2>";
  }
  else {
    echo "Error ! Try Again";
  }

  require_once 'footer.php';

  ?>
