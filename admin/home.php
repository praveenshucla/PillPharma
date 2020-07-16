
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet prefetch" href='https://fonts.googleapis.com/css?family=Roboto' type='text/css'>
<link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" type="text/css">
<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="main.css" />
<script>
    function addshop(){
        var loc = "http://localhost/Pills/admin/addshop.php";
        document.getElementById('main_iframe').setAttribute('src', loc);
    }
</script>
<script>
    function addpill(){
        var loc = "http://localhost/Pills/admin/addpill";
        document.getElementById('main_iframe').setAttribute('src', loc);
    }
</script>
<script>
    function updatepill(){
        var loc = "http://localhost/Pills/admin/up";
        document.getElementById('main_iframe').setAttribute('src', loc);
    }
</script>
<script>
    function delshop(){
        var loc = "http://localhost/Pills/admin/del/getshop.php";
        document.getElementById('main_iframe').setAttribute('src', loc);
    }
</script>
<script>
    function delpill(){
        var loc = "http://localhost/Pills/admin/del/delpill.php";
        document.getElementById('main_iframe').setAttribute('src', loc);
    }
</script>
<script>
    function checkinvo(){
        var loc = "http://localhost/Pills/admin/inventory";
        document.getElementById('main_iframe').setAttribute('src', loc);
    }
</script>

<nav>
    <hx>Pill Search</hx>
    <h3>Admin Panel</h3>
    <p></p>
    <button onclick="addshop()">Add Shop</button>
    <p></p>
    <button onclick="addpill()">Add A Pill To Shop</button>
    <p></p>
    <button onclick="updatepill()">Update Pill Details</button>
    <p></p>
    <button onclick="delshop()">Delete Shop</button>
    <p></p>
    <button onclick="delpill()">Delete Pill</button>
    <p></p>
    <button onclick="checkinvo()">Check Inventory</button>
    <p></p>
</nav>


    <div id="frameContainer">
      <iframe src="welcome.php" id="main_iframe"></iframe>
    </div>
