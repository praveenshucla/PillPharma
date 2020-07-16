
  <?php
  require_once 'header.php';
  	ob_start();
  	session_start();
  	require_once 'config.php';

    $shop = $_GET['shop'];
    $pillname = $_GET['pillname'];
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];

    $show = "update {$shop} set pillname='$pillname',quantity='$quantity',price='$price'";
    $res = mysqli_query($sql,$show);

    if($res){
      echo "<h2>Details Updated Successfully</h2><br><br>";
    }
    else {
      echo "Error ! Try Again";
    }

require_once 'footer.php';

?>
