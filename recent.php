
<?php
  require_once 'header.php';
	ob_start();
	session_start();
	require_once 'config.php';

$userid = $_GET['userid'];

echo "<h2>Displaying Recent Searches For User ID ".$userid."</h2>";

$rs = mysqli_query($sql,"SELECT * FROM recentSearch where userid='$userid'") or die ("no query");

if ($rs->num_rows > 0) {
  echo '<section>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
<tr>
  <th>Search Queries</th>
  <th>Searched On</th>
</tr>
</thead>
</table>
</div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<tbody>';

    // output data of each row
    while($row = $rs->fetch_assoc()) {
      echo'<tr>
        <td>' . $row["pillname"]. '</td>
        <td>' . $row["searched_on"]. '</td>
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
