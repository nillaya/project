
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');  //เซตให้รองรับภาษาไทย
?>