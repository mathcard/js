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

if(empty($_POST['for_aten'])){
	echo "É necessario informar o <b>Atendente.</b><br>";
	$aux = false;
}elseif (strlen($_POST['for_aten']) > 40){
	echo "O <b>Atendente</b> não pode exceder 40 caracteres<br>";
	$aux = false;
}

if(empty($_POST['for_desc'])){
	echo "É necessario informar a <b>Descrição.</b><br>";
	$aux = false;
}elseif (strlen($_POST['for_desc']) > 60){
	echo "A <b>Descrição</b> não pode exceder 60 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_fone1'])){
	echo "É necessario informar o <b>Fone 1.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_fone1']) > 15){
	echo "O <b>Fone 1</b> não pode exceder 11 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_fone2'])){
	echo "É necessario informar o <b>Fone 2.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_fone2']) > 15){
	echo "O <b>Fone 2</b> não pode exceder 11 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_email'])){
	echo "É necessario informar o <b>Email.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_email']) > 80){
	echo "O <b>Email</b> não pode exceder 80 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_cep'])){
	echo "É necessario informar o <b>CEP</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['cl_cep']) != 8){
	echo "O <b>CEP</b> deve possui 8 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_rua'])){
	echo "É necessario informar o <b>RUA.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_rua']) > 60){
	echo "A <b>RUA</b> não deve exceder 60 caracteres. <br>";
	$aux = false;
}

if(empty($_POST['cl_comp'])){
	echo "É necessario infomrar o <b>COMPLMENTO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_comp']) > 20){
	echo "O <b>COMPLMENTO</b> não deve exceder 20 caracteres. <br>";
	$aux = false;
}

if(empty($_POST['cl_numend'])){
	echo "É necessario infomrar o <b>NUMERO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_numend']) > 10){
	echo "O <b>NÚMERO</b> não deve exceder 10 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['cl_bairro'])){
	echo "É necessario infomrar o <b>BAIRRO</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['cl_bairro']) > 40){
	echo "O <b>BAIRRO</b> não deve exceder 40 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['cl_city'])){
	echo "É necessario infomrar a <b>CIDADE</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['cl_city']) > 50){
	echo "A <b>CIDADE</b> não deve exceder 50 caracteres.<br>";
	$aux = false;
}

	if($aux != true){
		header ("refresh:5; url=frmFornecedor.php");
	}else{
	$sql = "insert into fornecedor values (DEFAULT,?,?,?,?,?,?,?,?,?,?,?,?)";
	$resultado = $con->prepare($sql);
	$resultado->bindParam(1, $_POST['for_nome']);
	$resultado->bindParam(2, $_POST['for_aten']);
	$resultado->bindParam(3, $_POST['for_desc']);
	$resultado->bindParam(4, $_POST['cl_fone1']);
	$resultado->bindParam(5, $_POST['cl_fone2']);
	$resultado->bindParam(6, $_POST['cl_email']);
	$resultado->bindParam(7, $_POST['cl_cep']);
	$resultado->bindParam(8, $_POST['cl_rua']);
	$resultado->bindParam(9, $_POST['cl_numend']);
	$resultado->bindParam(10, $_POST['cl_comp']);
	$resultado->bindParam(11, $_POST['cl_bairro']);
	$resultado->bindParam(12, $_POST['cl_city']);
	$resultado->execute();
        echo "<b>Fornecedor</b> incluido com sucesso!!!";
	header ("refresh:5; url=listarFornecedor.php");
	}
?>
