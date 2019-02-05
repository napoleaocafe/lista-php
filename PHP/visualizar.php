<?php
include_once '../conn.php';
$id = $_POST['id'];
?>

<?php 
$sql = "
SELECT * 
FROM lista 
WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0 )
{
    while($row = mysqli_fetch_assoc($result))
    {
        $nomecompleto = $row['nomeCompleto'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        $setor = $row['setor'];
        echo "
        <div id='move-select'>
        <div class='select'>
            <label>Nome: </label>
            <span>".$nomecompleto."</span>
        </div>
        <div class='select'>
            <label>Email: </label>
            <span>".$email."</span>
        </div>
        <div class='select'>
            <label>Telefone: </label>
            <span>".$telefone."</span>
        </div>
        <div class='select'>
            <label>Setor: </label>
            <span>".$setor."</span>
        </div>
    </div>
        ";
    }
}
?>

    
    