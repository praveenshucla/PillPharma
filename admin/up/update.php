<?php
require_once 'header.php';
  	ob_start();
  	session_start();
  	require_once 'config.php';

  $shopname = $_GET['shopname'];
  $pillname = $_GET['pillname'];

  $show = "select * from {$shopname} where pillname='$pillname'";
  $res = mysqli_query($sql,$show);
  if($res==0)
  {
	echo '0 results for the entered search details';
  }

  else if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {

        echo '
        <h2>Update Pill.</h2>
          <form method="get" action=/Pills/admin/up/success.php?shop=".$shopname."" autocomplete="off">
          <p><b>[&ensp;Note</b> : Enter Default Values If There Is No Change For That Property. Default Values Are Place In " "&ensp;]</p><br><br>
                    Pil name :&ensp;<input type="text" name="pillname"  placeholder="Enter Pill Name" maxlength="50" value="" />&ensp;&ensp; [Default:"'.$row['pillname'].'"]<br><br>
                    Quantity :&ensp;<input type="text" name="quantity"  placeholder="Enter Quantity" maxlength="50" value="" />&ensp;&ensp;[Default:"'.$row['quantity'].'"]<br><br>
                    Price :&ensp;<input type="text" name="price"  placeholder="Enter Price" maxlength="50" value="" />&ensp;&ensp;[Default:"'.$row['price'].'"]<br><br>
                    For Shop:&ensp; <input type="text" name="shop" value="'.$shopname.'" readonly>&ensp;&ensp;[Uneditable Value]<br>
                    <button type="submit">Submit</button><br>
                  </form>

        ';
}
}

require_once 'footer.php';

?>
