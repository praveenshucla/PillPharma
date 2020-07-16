<?php
ob_start();
require_once 'header.php';
require_once 'config.php';
    session_start();


$shop = $_GET['shop'];


?>
<h2 class="">Add A Pill</h2>
  <form method="get" action="/Pills/admin/addpill/addpill.php" autocomplete="off">


            Pill Name :&ensp;<input type="text" name="pillname"  placeholder="Enter Pill Name" maxlength="50" value="" /><br><br>
            Quantity :&ensp;<input type="text" name="quantity"  placeholder="Enter Quantity" maxlength="40" value="" /><br><br>
            Price :&ensp;<input type="text" name="price"  placeholder="Enter Price" maxlength="15" /><br><br>
            Shopname:&ensp; <input type="text" name="shop" value="<?php echo $shop; ?>" readonly><br><br><br>
            <button type="submit">Add Pill</button><br>
<?php require_once 'footer.php'; ?>
