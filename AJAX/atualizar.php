<?php
include_once '../logo.php';
$id = $_REQUEST['id'];
$sql = "
SELECT * 
FROM lista 
WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$nomeCompleto = $row['nomeCompleto'];
$email = $row['email'];
$telefone = $row['telefone'];
$setor = $row['setor'];
?>
<script>
function atualizar (){
    var id = $("input[name = id]").val()
    var nomeCompleto = $("input[name = nomeCompleto]").val()
    var email = $("input[name = email]").val()
    var telefone = $("input[name = telefone]").val()
    var setor = $("select[name = setor]").val()
    $.post("../PHP/atualizar.php", 
    {id: id, nomeCompleto: nomeCompleto, email: email, telefone: telefone, setor: setor}, 
    function(data){
        $("#confirm").html(data);
    })
    return false
}
</script>
<body id="fundo">
    <div class="move-aling">
        <div id="content">
            <div id="head">
                <p>Atualizar</p>
            </div>
            <div id="confirm"></div>
            <div id="flex-inp">
                <form class="form" action="../PHP/atualizar.php" method="post" onsubmit="return atualizar()">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="move-inp">
                        <label class="text-color">Nome: </label>
                        <input class="inp" type="text" name="nomeCompleto" value="<?php echo $nomeCompleto;?>" />
                    </div>
                    <div class="move-inp">
                        <label class="text-color">Email: </label>
                        <input class="inp" type="text" name="email" value="<?php echo $email;?>" />
                    </div>
                    <div class="move-inp">
                        <label class="text-color">Telefone: </label>
                        <input class="inp" type="text" name="telefone" value="<?php echo $telefone;?>" />
                        <select class="alt" name="setor">
                            <option value="<?php echo $setor;?>">Selecionar</option>
                            <option value="web Back">Web Back</option>
                            <option value="web Front">Web Front</option>
                            <option value="mobile Back">Mobile Back</option>
                            <option value="mobile Front">Mobile Front</option>
                        </select>
                        <input class="alt" type="submit" value="Alterar" />
                    </div>
                </form>
            </div>
            <a href="./listar.php">Voltar</a>
        </div>
    </div>
</body>