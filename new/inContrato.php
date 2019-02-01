<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if(empty($_POST['con_cliente'])){
	echo "É necessario informar o <b>Cliente.</b><br>";
	$aux = false;
}elseif (strlen($_POST['con_cliente']) > 20){
	echo "O <b>Codigo do cliente</b> não pode exceder 20 caracteres<br>";
	$aux = false;
}

if(empty($_POST['con_dtass'])){
	echo "É necessario informar o <b>Data de Emissão.</b><br>";
	$aux = false;
}

if(empty($_POST['con_dtev'])){
	echo "É necessario informar a <b>Data do Evento.</b><br>";
	$aux = false;
}

if(empty($_POST['con_num'])){
	echo "É necessario informar o <b>Número do Contrato.</b><br>";
	$aux = false;
}

if(empty($_POST['con_pescont'])){
	echo "É necessario informar o <b>Número de pessoas Contratadas.</b><br>";
	$aux = false;
}

if(empty($_POST['con_pespre'])){
	echo "É necessario informar o <b>Número de pessoas presentes.</b><br>";
	$aux = false;
}

if(empty($_POST['con_valor'])){
	echo "É necessario informar o <b>Fone 2.</b><br>";
	$aux = false;
}

	if($aux != true){
		header ("refresh:5; url=frmCliente.php");
	}else{
	$sql = "insert into contrato values (?,?,?,?,?,?,?,FALSE)";
	$resultado = $con->prepare($sql);
	$resultado->bindParam(1, $_POST['con_num']);
	$resultado->bindParam(2, $_POST['con_cliente']);
	$resultado->bindParam(3, $_POST['con_dtass']);
	$resultado->bindParam(4, $_POST['con_dtev']);
	$resultado->bindParam(5, $_POST['con_pescont']);
	$resultado->bindParam(6, $_POST['con_pespre']);
	$resultado->bindParam(7, $_POST['con_valor']);
	$resultado->execute();
        echo "<b>Contrato </b> cadastrado com sucesso!!!";
	header ("refresh:5; url=listarContrato.php");
	}
?>