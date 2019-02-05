<?php
$servername = "localhost";
$username = "root";
$password = "741852";
$dbname = "alltest";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
die("falha: ".mysqli_error());
}
?>