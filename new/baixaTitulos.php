<?php 
require "connect.php";


if(empty($_POST['numreg'])){
	$contrato = $_POST['baixatitulo'];
}else{
	$contrato = $_POST['numreg'];
	$valor = $_POST['bx_valor'];
	$data = $_POST['bx_data'];		
	
#$LOGIN = $_SESSION['login']; #usado para buscar o usuario conectado
$LOGIN = $_COOKIE['name2']; #usado para buscar o usuario conectado
### Sql buscar o ID autorizador ##
$sqluser = $con->query("select id from usuario where login = '$LOGIN'");
$row = $sqluser->fetch(PDO::FETCH_OBJ);
$iduser = $row->id; 

	$sql = "UPDATE parcelas SET valorreb = '$valor', datapg = '$data', userid = '$iduser' WHERE registro = '$contrato'"; 
	$resultado = $con->prepare($sql);
	$resultado->execute();
	echo "<b><p align='center'>Titulos Baixado!<p></b>";
	header ("refresh:3; url=listarTitulos.php");	
}
require "modelo.php";
 ?>
 <h2>Título selecionado:</h2>
<div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>     
					<th>Nome</th>
					<th>Contrato</th>
                    <th>Parcela</th>
					<th>Vencimento</th>
					<th>Valor</th>					
                </tr>
            </thead>
    
<?php
$sqlshow = "select cl.nome as nome, p.numcont as contrato, p.parcela as parcela, p.datavenc as venc, p.valorparc as valor from parcelas p inner join contrato c on p.numcont=c.num inner join cliente cl on cl.id = c.idcliente where registro = '$contrato' ";
	$res = $con->prepare($sqlshow);
	$res->execute();	

	while ($row = $res->fetchObject()) {
            echo "<tr>";                      
            echo "<td><b>{$row->nome}</b></td>";
			echo "<td><b>{$row->contrato}</b></td>";
			echo "<td><b>{$row->parcela}</b></td>";			
			echo "<td><b>{$row->venc}</b></td>";
			echo "<td><b>{$row->valor}</b></td>";
			echo "</tr>";
	}
?>

</tbody>
</table>    

 <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Baixar Titulos</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="baixaTitulos.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">                        
						<div class="form-group">
                            <label for="bx_valor" class="sr-only">Valor Recebido</label>
                            <input type="number" class="form-control" id="bx_valor" name="bx_valor" placeholder="Valor Recebido" min="1" step="0.01" required />
                        </div>
						<div class="form-group">
                            <label for="bx_data" class="sr-only">Data Recebimento</label>
                            <input type="date" class="form-control" id="bx_data" name="bx_data" placeholder="Data de Recebimento" required />
                        </div>						
<?php
						echo "<INPUT TYPE='hidden' NAME='numreg' VALUE='$contrato'>";
?>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="listarTitulos.php">Voltar</a>
                </div>
            </form>
        </div>        
    </div>
</div>