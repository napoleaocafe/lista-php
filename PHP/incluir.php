<?php
include_once '../conn.php';
$nome = addslashes($_POST['nome']);
$sobrenome = addslashes($_POST['sobrenome']);
$nomeCompleto = $nome." ".$sobrenome;
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['telefone']);
$setor = addslashes($_POST['setor']);
$status = addslashes($_POST['status']);

if(empty($nome) && $nome = " " && empty($sobrenome) && $sobrenome = " " 
&& empty($email) && $email = " " && empty($telefone) && $telefone = " " 
&& empty($setor) && $setor = " ")                     
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Preencha todos os campos
    </div>";
else if(empty($nome) && $nome = " ")                  
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Preencha o campo nome
    </div>";
else if(empty($sobrenome) && $sobrenome = " ")        
    echo $erro = "
    <div class='msg erro'>
        <img class='bloq' src='../img/bloq.png' />Preencha o campo sobrenome
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
if(!isset($erro))
{
$sql = "
INSERT INTO lista 
(nomeCompleto, email, telefone, setor, status)
VALUES
('$nomeCompleto', '$email', '$telefone', '$setor', '$status') ";

mysqli_query($conn, $sql) or die();
    if(mysqli_insert_id($conn) > 0){
        echo "
        <div class='msg ok'>
            <img class='bloq' src='../img/ok.png' />Inserido com sucesso
        </div>";
    }
    else
    {
        echo "
        <div class='msg erro'>
            <img class='bloq' src='../img/bloq.png' />
            Houve um erro no momento de inserir os dados". mysqli_error($conn)."
        </div>";
    }
}
else
{
$erro;
}
?>
