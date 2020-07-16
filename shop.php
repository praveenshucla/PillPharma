

<?php
  require_once 'header.php';
	ob_start();
	session_start();
	require_once 'config.php';

  $shopname = $_GET['shopname'];

  	echo "<h2>Inventory Of ".$shopname. "</h2>";

  $query = "SELECT * FROM {$shopname}";
  $r = mysqli_query($sql,$query);
  if ($r->num_rows > 0) {
    echo '<section>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
  <tr>
    <th>Pill Name</th>
    <th>Quantity</th>
    <th>Price(Rupees)</th>
  </tr>
</thead>
</table>
</div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>';
      // output data of each row
      while($row = $r->fetch_assoc()) {

          echo'<tr>
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
  } else {
      echo "0 results";
    }

    require_once 'footer.php';
?>
