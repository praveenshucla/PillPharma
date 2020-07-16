
<?php
  require_once 'header.php';
	require_once 'usersession.php';

echo '<h2>Search Results</h2><br><br>';

$pillname = $_GET['pillname'];
  $uarea = $userRow['area'];
	$userid = $userRow['userId'];


$n=0;
$array = array();
// run query
$shops = mysqli_query($sql,"SELECT * FROM area where areaname='$uarea'") or die ("no query");

$trig = "create trigger rstrig1 after insert on searchLogs for each row insert into recentSearch(userid, pillname) values (new.userid, new.pillname);";
mysqli_query($sql,$trig);

$ins = "insert into searchLogs (userid, pillname) values ('$userid','$pillname')";
mysqli_query($sql,$ins);


if ($shops->num_rows > 0) {
    // output data of each row
    while($row = $shops->fetch_assoc()) {
      $sname = $row["shopname"];
      $ad = $row["address"];
      $pin = $row["pincode"];
      $an = $row["areaname"];
      $ph = $row["pnumber"];

			$query = "SELECT * FROM {$sname} where pillname='$pillname'";
			$r = mysqli_query($sql,$query);
			if ($r) {
        echo '<section>
    <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
    <thead>
      <tr>
        <th>| Shop Name</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Phone No. |</th>
        <th>Pill Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    </table>
    </div>
    <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>';
          $n++;
			    while($row = $r->fetch_assoc()) {
            echo'<tr>
              <td>' . $sname. '</td>
              <td>' . $ad. '</td>
              <td>' . $pin. '</td>
              <td>' . $ph. '</td>
              <td>' . $row["pillname"]. '</td>
              <td>' . $row["quantity"]. '</td>
              <td>' . $row["price"]. '</td>
            </tr>
  ';

    		}
        echo '</tbody>
      </table>
    </div>
  </section>
  ';
      }
      else if(!$r){
        echo "<br>";
      }
			}
		}
	else {
    echo "0 results ";
  }


  if($n==0)
  {
    echo "<h3>Shops In Your Area Does Not Have This Pill</h3> ";
  }

  require_once 'footer.php';

?>
