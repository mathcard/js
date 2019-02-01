<?php
require "modelo2.php";
require "verifica.php";
require "connect.php";

# número do contrato
$contrato2 = $_COOKIE['armaz_cont'];

# descobrindo o tamanho do vetor.
$tam = count($_POST['parcela']);

# valor do contrato
$sql= $con->query("select valor from contrato where num = '$contrato2'");
$row = $sql->fetch(PDO::FETCH_OBJ);
$valortotal = $row->valor;

# valor das parcelas enviadas do frmParcelas
$parcelas = array_sum($_POST['valor']);

if($parcelas!=$valortotal){
	echo "<br><br><b>O valor das parcelas digitadas, não correspondem com o valor do contrato!!!</b> ";
	header ("refresh:5; url=frmParcelas.php"); 
}else{	
	$auxemi = $_POST['emissao'];	
	for($i=0; $i<$tam; $i++){
		$aux1 = $_POST['parcela'][$i];
		$aux2 = $auxemi;
		$aux3 = $_POST['venc'][$i];	
		$aux4 = $_POST['valor'][$i];	
		$aux5 = $_POST['formapg'][$i];	

#echo "parcela=".$aux1."emisao".."".."".."".		
		$sql = "insert into parcelas (registro, numcont, parcela, dataemissao, datavenc, valorparc, formapg) values (DEFAULT,?,?,?,?,?,?)";
		$resultado = $con->prepare($sql);
		$resultado->bindParam(1, $contrato2);
		$resultado->bindParam(2, $aux1);
		$resultado->bindParam(3, $aux2);
		$resultado->bindParam(4, $aux3);
		$resultado->bindParam(5, $aux4);
		$resultado->bindParam(6, $aux5);
		$resultado->execute();	
	}
	$sqlSoma = $con->query("select sum(valorparc) as soma from parcelas where numcont = '$contrato2'");
	$row = $sqlSoma->fetch(PDO::FETCH_OBJ);
	$soma = $row->soma;

	if($soma==$valortotal){
		echo "<br><br><b>Parcelas Cadastradas!!!</b> ";
		$sql = "UPDATE contrato SET parcelascadastradas = TRUE WHERE num = '$contrato2'"; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		header ("refresh:3; url=parcincom.php");   
	}
}
?>