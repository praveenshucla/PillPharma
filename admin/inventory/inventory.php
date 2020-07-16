<?php
require_once 'header.php';
	ob_start();
	session_start();
	require_once 'config.php';

$shop = $_GET['shop'];

$show = "select * from {$shop}";
$res = mysqli_query($sql,$show);

if ($res->num_rows > 0) {
  echo '<h2>Inventory Of Shop '.$shop.'<p></p><section>
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
    while($row = $res->fetch_assoc()) {

    echo'<tr>
      <td>' . $row["pillname"]. '&ensp;<a href="http://localhost/Pills/admin/up/update.php?shopname='.$shop.'&pillname='.$row["pillname"].'" class="glow">Update Pill</a></td>
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

require_once 'footer.php';

  ?>
