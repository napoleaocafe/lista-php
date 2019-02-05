<?php
include_once '../conn.php';
$id = $_POST['id'];
$nomeCompleto =  addslashes($_POST['nomeCompleto']);
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['telefone']);
$setor = addslashes($_POST['setor']);

if(empty($nomeCompleto) && $nomeCompleto = " ")       
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Preencha o campo nome
    </div>";
else if(empty($email) && $email = " ")                
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Preencha o campo email 
    </div>";
else if(empty($telefone) && $telefone = " ")          
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Preencha o campo telefone
    </div>";
else if(empty($setor) && $setor = " ")                
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Selecione o campo setor
    </div>";
else if(!isset($erro)){
$sql = "
UPDATE lista 
SET 
nomeCompleto = '$nomeCompleto', 
email = '$email', 
telefone = '$telefone', 
setor = '$setor'  
WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        echo "
        <div class='msg ok'>
            <img class='bloq' src='../img/ok.png'>Atualizado com sucesso
        </div>";
    }else{
        echo "Erro";
    }
}
?>