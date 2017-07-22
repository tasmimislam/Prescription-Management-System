<?php
$server     ="";
$username   ="";
$password   ="";
$db         ="";

$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn)
{
    die("connection failed: " . mysqli_connect_error());
}
?>