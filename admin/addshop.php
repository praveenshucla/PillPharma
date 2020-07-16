<?php
ob_start();
require_once 'header.php';
require_once 'config.php';
    session_start();

if ( isset($_POST['addshop']) ) {

  $areaname = trim($_POST['areaname']);
  $areaname = strip_tags($areaname);
  $areaname = htmlspecialchars($areaname);

  $shopname = trim($_POST['shopname']);
  $shopname = strip_tags($shopname);
  $shopname = htmlspecialchars($shopname);

  $pincode = trim($_POST['pincode']);
  $pincode = strip_tags($pincode);
  $pincode = htmlspecialchars($pincode);

  $address = trim($_POST['address']);
  $address = strip_tags($address);
  $address = htmlspecialchars($address);

  $pnumber = trim($_POST['pnumber']);
  $pnumber = strip_tags($pnumber);
  $pnumber = htmlspecialchars($pnumber);

  $ins = "insert into area (areaname, shopname, pincode, address, pnumber) values ('$areaname','$shopname','$pincode','$address','$pnumber')";
	$query = mysqli_query($sql,$ins);

  $trig = "create trigger rstrig after insert on area for each row insert into shoplist (shopname, areaname) values (new.shopname, new.areaname);";
	mysqli_query($sql,$trig);


  if($query) // will return true if successful else it will return false
{
  $create = "CREATE TABLE {$shopname}(
    pillid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pillname VARCHAR(30) NOT NULL,
    quantity VARCHAR(30) NOT NULL,
    price VARCHAR(70) NOT NULL UNIQUE
)";
$addtable = mysqli_query($sql,$create);
if($addtable){
  echo '<br> Table Created !';
}
else {
  echo '<br> Table creation failed';
}
}
}
else {
  echo '<h2>Add A Shop To Database</h2><form method="post" action="/Pills/admin/addshop.php" autocomplete="off">
        
	    Shop Name :&ensp;<input type="text" name="shopname"  placeholder="Enter Shop Name" maxlength="50" value="" required /><br><br>
	    Area Name :&ensp;<input type="text" name="areaname"  placeholder="Enter Area Name" maxlength="40" value="" required/><br><br>
	    Pincode :&ensp;<input type="text" name="pincode"  placeholder="Enter Pincode" pattern="[0-9]{6}" required/><br><br>
            Address :&ensp;<input type="text" name="address" placeholder="Enter Address" maxlength="50" value="" required/><br><br>
            Phone Number :&ensp;<input type="text" name="pnumber" placeholder="Enter Phone Number" pattern="[0-9]{10}" value="" required/><br><br><br>
	   <button type="submit" name="addshop">Add Shop</button><br>';
}
?>

<?php require_once 'footer.php'; ?>
