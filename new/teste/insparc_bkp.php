<?php
require "connect.php";
require "modelo.php";

if(empty($_COOKIE['armaz_cont'])){
	$contrato = $_GET['id'];
	setcookie("armaz_cont", $contrato);	
}else{
	$contrato = $_COOKIE['armaz_cont'];
}

$sql= $con->query("select con.valor as valor, cli.nome as nome from contrato con inner join cliente cli on con.idcliente=cli.id where num = '$contrato'");
#$sql = $con->query("select valor from contrato where num = '$contrato'");
$row = $sql->fetch(PDO::FETCH_OBJ);
$valortotal = $row->valor;
$nomecliente = $row->nome;

$sqlSoma = $con->query("select sum(valorparc) as soma from parcelas where numcont = '$contrato'");
$row = $sqlSoma->fetch(PDO::FETCH_OBJ);
$soma = $row->soma;
if($soma==NULL){
	$soma = 0;
}
$diferenca = $valortotal - $soma;
if($soma>$valortotal){
	echo "<b>Erro</b> valor das parcelas n?o pode ultrapasar o valor do contrato!!!";
	header ("refresh:5; url=parcincom.php");
}elseif($soma==$valortotal){
	echo "<b>Parcelas Cadastradas!!!</b> ";
	$sql = "UPDATE contrato SET parcelascadastradas = TRUE WHERE num = '$contrato'"; 
	$resultado = $con->prepare($sql);
	$resultado->execute();
	header ("refresh:5; url=parcincom.php");
}
?>
<div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>                
					<th>Valor Total</th>
					<th>Valor Cadastrado</th>
					<th>Restante</th>
                </tr>
            </thead>
    </div>
	<tbody>	
            <?php                          
                echo "<tr>";          
                echo "<td><b>{$valortotal}</b></td>";
                echo "<td><b>{$soma}</b></td>";
				echo "<td><b>{$diferenca}</b></td>";				
                echo "</tr>";                    
            ?>
    </tbody>
    </table>
	
<div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inserir Parcela - CONTRATO: <?php echo "$contrato CLIENTE: $nomecliente" ?></div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="insparcIn.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">                        
						<div class="form-group">
                            <label for="par_num" class="sr-only">Parcela</label>
                            <input type="number" class="form-control" id="par_num" name="par_num" placeholder="Nº da Parcela" maxlength="20"   />
                        </div>
						<div class="form-group">
                            <label for="par_valor" class="sr-only">Valor Parcela</label>
                            <input type="number" class="form-control" id="par_valor" name="par_valor" placeholder="Valor" maxlength="10"   />
                        </div>					
						<div class="form-group">
                            <label for="par_venc" class="sr-only">Data de Vencimento</label>
                            <input type="date" class="form-control" id="par_venc" name="par_venc" placeholder="Data de Vencimento" />
                        </div>                        						
                    </div>
                    <?php echo "<input type='hidden' name='par_numcont' id='par_numcont' value='$contrato'>";?>
					<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="parcincom.php">Voltar</a>
                </div>
            </form>
        </div>