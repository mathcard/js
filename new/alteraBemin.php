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

if (!empty($_POST['cl_nome'])) {
	if (strlen($_POST['cl_nome']) <= 50){
	    $nome="nome='" . $_POST['cl_nome']. "' ";
	    $sql = "UPDATE bem SET " .$nome ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Nome</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Nome</b> não pode exceder 50 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_desc'])) {
	if (strlen($_POST['cl_desc']) <= 80){
	    $desc="descricao='" . $_POST['cl_desc']. "' ";
	    $sql = "UPDATE bem SET " .$desc ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Descricao</b> alterado com sucesso.<br>";
	    }else{
        	echo "A <b>Descricao</b> não pode exceder 80 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_aquis'])) {	
	$aquis="dtaquisicao='" . $_POST['cl_aquis']. "' ";
	$sql = "UPDATE bem SET " .$aquis ." WHERE id = " . $numero; 
	$resultado = $con->prepare($sql);
	$resultado->execute();
	echo "<b>Data de Aquisição</b> alterado com sucesso.<br>";
	}else{
        echo "Não foi informada a <b>Data de Aquisição</b><br>";
	    $aux = false;
	}


if (!empty($_POST['cl_valor'])) {	
	$valor="valor='" . $_POST['cl_valor']. "' ";
	$sql = "UPDATE bem SET " .$valor ." WHERE id = " . $numero; 
	$resultado = $con->prepare($sql);
	$resultado->execute();
	echo "<b>Valor</b> alterado com sucesso.<br>";
	}else{
        echo "Não foi informada o <b>Valor</b><br>";
	        $aux = false;
	}

	if($aux==true){
		header("refresh:3; url=listarBem.php");
	}else{
		header("refresh:4; url=alteraBem.php?id=$numero");
	}
?>