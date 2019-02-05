<?php
include_once '../logo.php';
?>

<script>
function incluir (){
    var nome = $("input[name = nome]").val()
    var sobrenome = $("input[name = sobrenome]").val()
    var email = $("input[name = email]").val()
    var telefone = $("input[name = telefone]").val()
    var setor = $("select[name = setor]").val()
    var status = $("input[name = status]").val()
    $.post("../PHP/incluir.php", 
    {nome: nome, sobrenome: sobrenome, email: email, telefone: telefone, setor: setor, status: status}, 
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
                <p>Incluir</P>
            </div>
            <div id="confirm"></div>
                <div id="flex-inp">
                    <form class="form" action="../PHP/incluir.php" method="post" onsubmit="return incluir()" >
                
                        <div class="move-inp">
                            <label class="text-color">Nome: </label>
                            <input class="inp" type="text" requered name="nome" />
                            <label class="text-color">Sobrenome: </label>
                            <input class="inp" type="text" requered name="sobrenome" />
                        </div>
                        <div class="move-inp">    
                            <label class="text-color">Email: </label>
                            <input class="inp" type="email" requered name="email" />
                        </div>
                        <div class="move-inp">      
                            <label class="text-color">Telefone: </label>
                            <input class="inp" type="text" requered name="telefone" />
                            <input class="inp" type="hidden" requered name="status" value="0" />
                            <select class="alt" name="setor">
                                    <option value="">Setores</option>
                                    <option value="web Back">Web Back</option>
                                    <option value="web Front">Web Front</option>
                                    <option value="mobile Back">Mobile Back</option>
                                    <option value="mobile Front">Mobile Front</option>
                            </select>
                            <input class="alt"  type="submit" value="Incluir" />
                        </div>   
                     
                    </form>
                </div>   
                <a href="./listar.php">Voltar</a>
        </div>
    </div>

</body>