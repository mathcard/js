<?php 
require "connect.php"; 

if(empty($_COOKIE['armaz_cont'])){
	$contrato = $_GET['id'];
	setcookie("armaz_cont", $contrato);	
}else{
	$contrato = $_COOKIE['armaz_cont'];
}
require "modelo.php";
$sql= $con->query("select con.valor as valor, cli.nome as nome from contrato con inner join cliente cli on con.idcliente=cli.id where num = '$contrato'");
$row = $sql->fetch(PDO::FETCH_OBJ);
$valor = $row->valor;
$nomecliente = $row->nome;

echo "<div align='center'><h2>Inserindo Parcelas<br><br></h2></div>
	<div><h3> Número do Contrato:$contrato.<br></h3</div>
	<div><h3> Cliente:$nomecliente.<br></h3</div>
	<div><h3> Valor:$valor R$<br></h3</div>";
	//$script = "<script> var texto = '$valor R$'; </script>";
	$script = "<script> var texto = '$valor'; </script>";
	echo $script;
?>
<head>
<p id="resultado"></p> 
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/funcoes.js"></script>

<script>
var quant = document.getElementsByName("valor[]");
var teste = [];

function somarValores(){
var soma = 0;

for (var i=0; i<quant.length; i++){
		teste[i] = parseFloat(quant[i].value, 10);            
        soma += teste[i];
 }  
  //#var aux = " R$";
  //document.getElementById("resultado").innerHTML = soma+aux;
  document.getElementById("resultado").innerHTML = soma;
  document.getElementById("valorParcelas").value = document.getElementById("resultado").innerHTML;   
}

function validVal(){
var valorvalid = document.getElementById("valorTotal").value;
var valorparc = parseFloat(document.getElementById("valorParcelas").value);

	if(valorvalid!=valorparc){
		alert('O Valor das parcelas não corresponde com o valor do contrato!');
		return false;
	}else{
		return true;
	}
}

</script>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>
<body>

<form action="inParcelas.php" role="form" id="formExampleAdd" method="post" accept-charset="utf-8">
<table class="tabelaEditavel" id="products-table">	
<tbody>
	<tr>
		<th>Parcelas</th>
		<th>Emissão</th>
		<th>Vencimento</th>
		<th>Valor</th>
		<th>Tipo Pagameno</th>	
		<th>Ações</th>	
	</tr>
	<tr>
		<td><input name="parcela[]" class="form-control" type="number" id="parcela" min="0"  required /></td>
		<td><input name="emissao" class="form-control" type="date" id="emissao" required /></td>
		<td><input name="venc[]" class="form-control" type="date" id="venc"  required /></td>
		<td><input name="valor[]" onblur="somarValores()" class="form-control" type="number" id="valor" min="1" step="0.01" required /></td>
		<td><input name="formapg[]" class="form-control" type="text" id="formapg"  maxlength="20" required /></td>							
		<td><button type="button">Remover</button></td>
	</tr>
</tbody>
	<tfoot>	 
		<tr>
		<button class="btn btn-primary" onclick="AddTableRow()" type="button">Adicionar Parcelas</button>		
		</tr>
	</tfoot>
</table>
</body>
	<div class="form-group">
    <br><br><input class="btn btn-primary" type="submit" onclick="return validVal();" value="Salvar">
	</div>
	<table class="painel" >	
<tbody>
	<tr>
		<th>Total(R$)</th>
		<th>Parcelas(R$)</th>
	</tr>
	<tr>
		<td><input type="text" id="valorTotal" /></td>
		<td><input type="text" id="valorParcelas" /></td>
	</tr>
</tbody>	
</table>
		<script>			
			document.getElementById("valorTotal").value = texto;
		</script>
    </div>	
</form>