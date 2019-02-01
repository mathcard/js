<?php
require "verifica.php";
require "modelo2.php";
require "connect.php";

echo "<br><br>";
$aux = true;
if(empty($_POST['formapg'])){
	echo "É necessario informar a <b>Forma de Pagamento.</b><br>";
	$aux = false;
}elseif (strlen($_POST['formapg']) > 20){
	echo "A <b>Forma de pagamento</b> não pode exceder 20 caracteres<br>";
	$aux = false;
}

if(empty($_POST['desc'])){
	echo "É necessario informar a <b>Descrição.</b><br>";
	$aux = false;
}elseif (strlen($_POST['desc']) > 50){
	echo "A <b>Descrição</b> não pode exceder 50 caracteres<br>";
	$aux = false;
}

if(empty($_POST['dataemi'])){
	echo "É necessario informar o <b>Profissão.</b><br>";
	$aux = false;
}

if(empty($_POST['datavenc'])){
	echo "É necessario informar o <b>RG.</b><br>";
	$aux = false;
}

if(empty($_POST['valor'])){
	echo "É necessario informar o <b>CPF.</b><br>";
	$aux = false;
}

$contrato = $_POST['contrato'];

	if($aux != true){
		header ("refresh:4; url=frmAcrescimo.php?id=$contrato");
	}else{		
		$emi = $_POST['dataemi'];
		$venc = $_POST['datavenc'];
		$valor = $_POST['valor'];
		$formapg = $_POST['formapg'];
		$desc = $_POST['desc'];
		$parc = 0;		
		
		$sqlacre = "insert into acrescimo values (DEFAULT,?,?,?)";
		$res = $con->prepare($sqlacre);
		$res->bindParam(1, $contrato);
		$res->bindParam(2, $valor);
		$res->bindParam(3, $desc);
		$res->execute();
		if($res->rowCount() == 0){
				echo "Houve algum <b>Erro</b> na realização do acrescimo.<br>";
				header ("refresh:3; url=frmAcrescimo.php?id=$contrato");
		}		
		$sql = "insert into parcelas (registro, numcont, parcela, dataemissao, datavenc, valorparc, formapg) values (DEFAULT,?,?,?,?,?,?)";
		$resultado = $con->prepare($sql);
		$resultado->bindParam(1, $contrato);
		$resultado->bindParam(2, $parc);
		$resultado->bindParam(3, $emi);
		$resultado->bindParam(4, $venc);
		$resultado->bindParam(5, $valor);
		$resultado->bindParam(6, $formapg);
		$resultado->execute();		
		if($resultado->rowCount() == 0){
				echo "Houve algum <b>Erro</b> na criação das forma de pagamento do acrescimo.<br>";
				header ("refresh:3; url=frmAcrescimo.php?id=$contrato");
			}else{
				echo "<b>Acréscimo realizado.</b> ";		
				header ("refresh:3; url=contratos.php");  
			}
		
	}
?>