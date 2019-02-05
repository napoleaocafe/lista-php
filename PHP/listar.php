<?php 
include_once '../conn.php';
$campo = addslashes($_POST['campo']);

$sql = "
SELECT id, nomeCompleto, status
FROM lista
WHERE nomeCompleto
LIKE '%$campo%' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        
        $id = $row['id'];
        $nomeCompleto = $row['nomeCompleto'];
        $status = $row['status'];
        if($status == 0){
            $status = 'habilitado';
        }
        else
        {
            $status = 'desabilitado';
        }
        echo"
        <tr class='$status'>
            <td>$id</td>
            <td>$nomeCompleto</td>
            <td>
                <div class='viasualizar' id=$id'>
                    <img data-toggle='modal' data-target='#myModal' 
                    class='lupa' src='../img/lupa.png' />
                </div>
            </td> 
            <td><a href='./atualizar.php?id=$id'><img class='edit' src='../img/edit.png' /></a></td> 
            <td>
                <div class='desabilitar' id='$id'>
                    <img class='lupa' src='../img/excluir.png' />   
                </div>
            </td> 
        </tr>";
        
    }
}
?>