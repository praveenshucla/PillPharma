<?php
ob_start();
require_once 'header.php';
require_once 'config.php';
    session_start();

$shop = $_GET['shop'];
$quantity = $_GET['quantity'];
$pillname = $_GET['pillname'];
$price = $_GET['price'];


$ins = "insert into {$shop} (pillname, quantity, price) values ('$pillname','$quantity','$price')";

$shops = mysqli_query($sql,$ins);

if($shops){
  echo '<br><h2>Pill ' .$pillname. ' Added To Shop ' .$shop. ' Successfully</h2><br><br>';
}
else {
  echo '<br>ERROR !!';
}

require_once 'footer.php';

?>
