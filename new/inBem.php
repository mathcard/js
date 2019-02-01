<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if(empty($_POST['for_nome'])){
	echo "É necessario informar o <b>NOME.</b><br>";
	$aux = false;
}elseif (strlen($_POST['for_nome']) > 50){
	echo "O <b>NOME</b> não pode exceder 50 caracteres<br>";
	$aux = false;
}

if(empty($_POST['for_desc'])){
	echo "É necessario informar a <b>Descrição.</b><br>";
	$aux = false;
}elseif (strlen($_POST['for_desc']) > 80){
	echo "A <b>Descrição</b> não pode exceder 60 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_aquis'])){
	echo "É necessario informar o <b>Fone 1.</b><br>";
	$aux = false;
}

if(empty($_POST['cl_valor'])){
	echo "É necessario informar o <b>Fone 2.</b><br>";
	$aux = false;
}

	if($aux != true){
		header ("refresh:5; url=frmBem.php");
	}else{
	$sql = "insert into bem values (DEFAULT,?,?,?,?)";
	$resultado = $con->prepare($sql);
	$resultado->bindParam(1, $_POST['for_nome']);
	$resultado->bindParam(2, $_POST['for_desc']);
	$resultado->bindParam(3, $_POST['cl_aquis']);
	$resultado->bindParam(4, $_POST['cl_valor']);	
	$resultado->execute();
        echo "<b>Bem</b> incluido com sucesso!!!";
	header ("refresh:5; url=listarBem.php");
	}
?>