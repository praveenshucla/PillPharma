<?php
$sql = new mysqli('localhost', 'root', '', 'Pills');

if($sql->connect_errno > 0){
    die('Unable to connect to database [' . $sql->connect_error . ']');
}
?>
