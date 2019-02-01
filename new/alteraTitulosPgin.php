<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['cl_desc'])) {
	if (strlen($_POST['cl_desc']) <= 20){
	    $formapg="formapg='" . $_POST['cl_desc']. "' ";
	    $sql = "UPDATE contasapagar SET " .$formapg ." WHERE registro = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Forma de Pagamento</b> alterado com sucesso.<br>";
	    }else{
        	echo "A <b>Forma de Pagamento</b> não pode exceder 20 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['data_venc'])) {	
	$venc="datavenc='" . $_POST['data_venc']. "' ";
	$sql = "UPDATE contasapagar SET " .$venc ." WHERE registro = " . $numero; 
	$resultado = $con->prepare($sql);
	$resultado->execute();
	echo "<b>Data de Vencimento</b> alterado com sucesso.<br>";
	}else{
        echo "Não foi informada a <b>Data de vencimento</b><br>";
	    $aux = false;
	}


if (!empty($_POST['cl_valor'])) {	
	$valor="valorparc='" . $_POST['cl_valor']. "' ";
	$sql = "UPDATE contasapagar SET " .$valor ." WHERE registro = " . $numero; 
	$resultado = $con->prepare($sql);
	$resultado->execute();
	echo "<b>Valor</b> alterado com sucesso.<br>";
	}else{
        echo "Não foi informada o <b>Valor</b><br>";
	        $aux = false;
	}

	header("refresh:3; url=listarTitulosPg.php");
	
?>