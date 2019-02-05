<?php
include_once '../conn.php';
$id = $_POST['id'];
$status = 1;

$sql = "
UPDATE lista 
SET status='$status'  
WHERE id='$id'";

if(mysqli_query($conn, $sql))
{
    echo "Desabilitado";
}

?>
