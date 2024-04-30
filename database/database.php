<?php
// Connecting to the Database
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="UniBridge";

$data = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
if (!$data) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
