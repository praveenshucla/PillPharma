<?php
$sql = new mysqli('localhost', 'root', '', 'pills');

if($sql->connect_errno > 0){
    die('Unable to connect to database [' . $sql->connect_error . ']');
}
?>
