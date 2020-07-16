<?php
  ob_start();
  require_once 'header.php';
  require_once 'config.php';
      session_start();

  if ( isset($_POST['delpill']) ) {

    $shop = trim($_POST['shop']);
    $shop = strip_tags($shop);
    $shop = htmlspecialchars($shop);

    $pillname = trim($_POST['pillname']);
    $pillname = strip_tags($pillname);
    $pillname = htmlspecialchars($pillname);

    $del = "delete from {$shop} where pillname='$pillname'";
    $res = mysqli_query($sql,$del);

    if($res) {
      echo "<br><h2>Pill " .$pillname. " Was Deleted Successfuly From Shop " .$shop. "</h2><br><br>";
    }
    else {
      echo "Error ! Try Again";
    }
  }
  else {

    echo '<h2 class="">Delete Pill From Shop</h2>
    <form method="post" action="/Pills/Admin/del/delpill.php" autocomplete="off">


              Shop Name :&ensp;<input type="text" name="shop"  placeholder="Enter Shop Name" maxlength="50" value="" /><br><br>
              Pill Name :&ensp;<input type="text" name="pillname"  placeholder="Enter Pill Name" maxlength="40" value="" /><br><br>
              <button type="submit" class="button glow-button" name="delpill">Delete Pill</button><br>';
  }
    ?>


<?php require_once 'footer.php'; ?>
