<?php
$connection = mysqli_connect("localhost", "root", ""); 

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$db = mysqli_select_db($connection, "v_015_digitalface");
?>