<?php
include_once '../logo.php';
?>

<script>
//A função recebe id pesquisaUser, var campo
//se var campo não for vazio
//devolve resultado da função
//na div com id pesquisa
 $(function () {
     $("#pesquisaUser").keyup(function () {
        var campo = $(this).val()
        if(campo != " " )
        {
            campo = $("#pesquisaUser[name = campo]").val()
            $.post("../PHP/listar.php", {campo: campo}, function (pesq) {
                $("#pesquisa").html(pesq)
            })
        }
     })
 })
</script>


<body id="fundo">
    <div class="move-aling">
        <div id="content">
            <div id="head">
                <p>Inicio</p>
            </div>
            <a href="../AJAX/incluir.php"><button class="btn-style">Incluir</button></a>
            <form method="post" action="">
                <label>Pesquisar usuário: </label>
                <input type="text" id="pesquisaUser" name="campo" />
                <img id="pesq" src="../img/pesq.png" />
            </form>
            <div class="aviso"></div>
            <table id="table">
                <thead>
                    <tr>
                        <th >Id</th>
                        <th width="85%">Nome Completo</th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                        <th width="5%"></th>
                    </tr>
                </thead>
                <tbody id="pesquisa">
<?php
$sql = "
SELECT id, nomeCompleto, status 
FROM lista 
";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $id = $row['id'];
        $nomeCompleto = $row['nomeCompleto'];
        $status = $row['status'];
        
        if($status == 0)
        {
            $status = 'habilitado';
            $vsl = 'blk';
        }
        else
        {
            $status = 'desabilitado';
            $vsl = 'hid';
        }

        echo "
        <tr class='$status'>
            <td>" . $id."</td>
            <td>" . $nomeCompleto."</td>
            <td>
                <div class='visualizar $vsl' id='$id'>
                    <img data-toggle='modal' data-target='#myModal' 
                    class='lupa' src='../img/lupa.png' />
                </div>
            </td> 
            <td>
                <a href='./atualizar.php?id=$id' class='$vsl'>
                    <img class='edit' src='../img/edit.png' />
                </a>
            </td> 
            <td>
                <div class='desabilitar $vsl' id='$id'>
                    <img class='lupa' src='../img/excluir.png' />
                </div>
            </td> 
            </div>
        </tr>";
    }
}
?>

                <tbody>
            </table>
        </div>
    </div>
    <script>
    $(".desabilitar").click(function(){
        let id = $(this).attr('id');
        $.post("../PHP/apagar.php", { id: id }, function(resp){
                
                $(".aviso").html(resp)

        });
    });
</script>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Dados pessoais</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script>
    $(".visualizar").click(function(){
        let id = $(this).attr('id');
        $.post("../PHP/visualizar.php", { id: id }, function(modal){
                
                $(".modal-body").html(modal)

        });
    });
</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>


