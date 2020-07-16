<?php require_once 'header.php'; ?>

<h2 class="">Update Pill</h2>
  <form method="get" action="/Pills/Admin/up/update.php" autocomplete="off">
            Shopname&ensp; :<input type="text" name="shopname"  placeholder="Enter Shop Name" maxlength="50" value="" /><br><br>
            Pill name&ensp; :<input type="text" name="pillname"  placeholder="Enter Pill Name" maxlength="50" value="" /><br><br><br>
            <button type="submit">Submit</button><br>
          </form>

          <?php require_once 'footer.php'; ?>

</body>
</html>
