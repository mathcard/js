<?php 
require "verifica.php";
require "modelo2.php";
require "connect.php";

$aux = true;
if(empty($_POST['opestorna'])){
	$aux = false;
}

if(empty($_POST['reg'])){
	$aux = false;
}

if($aux !=true){
	echo "<br><br><b>Não</b> foi possivel estornar o título selecionado.";
}else{
	$parcela = $_POST['reg'];	
	$opcao = $_POST['opestorna'];
	if($opcao=='receber'){
		$sql = "UPDATE parcelas SET valorreb = NULL, datapg = NULL, userid = NULL WHERE registro = '$parcela'"; 
	}elseif($opcao=='pagar'){
		$sql = "UPDATE contasapagar SET valorreb = NULL, datapg = NULL, userid = NULL WHERE registro = '$parcela'"; 
	}
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<br><br><b>Título</b> estornado com sucesso!";
		if($opcao=='receber'){	
			header ("refresh:3; url=listarTitulos.php");	
		}elseif($opcao=='pagar'){	
			header ("refresh:3; url=listarTitulosPg.php");	
		}
	}	
 ?>