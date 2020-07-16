<?php require_once 'header.php'; ?>
<h2>Check Inventory</h2>
  <form method="get" action="/Pills/admin/inventory/getshop.php" autocomplete="off">
            Shopname :&ensp;<input type="text" name="shopname"  placeholder="Enter Shop Name" maxlength="50" value="" /><br><br><br>
            <button type="submit" class="button glow-button">Submit</button><br>
          </form>

          <?php require_once 'footer.php'; ?>

</body>
</html>
