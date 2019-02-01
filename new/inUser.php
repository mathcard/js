<?php
#session_start();
#$id=$_SESSION['login'];
require "modelo2.php";
require "connect.php";
require "verifica.php";
echo "<br><br>";
$aux = true;

$a=$_POST['us_log'];
$b=$_POST['us_nome'];
$c=$_POST['us_passwd'];

if(empty($a)){
	echo "O <b>LOGIN</b> deve ser informada.<br>";
	$aux = false;
}elseif(strlen($a) > 20){
	echo "O <b>LOGIN</b> não deve exceder 20 caracteres.<br>";
	$aux = false;
}

if(empty($b)){
	echo "O <b>NOME</b> deve ser informada.<br>";
	$aux = false;
}elseif(strlen($b) > 50){
	echo "O <b>NOME</b> não deve exceder 50 caracteres.<br>";
	$aux = false;
}

if(empty($c)){
	echo "É necessario infomar a <b>SENHA</b><br>";
	$aux = false;
}elseif(strlen($c) > 80){
	echo "A <b>SENHA</b> não deve exceder 80 caracteres. <br>";
	$aux = false;
}

if(empty($_POST['us_passwd2'])){
	echo "É necessario confirmar a <b>SENHA</b>. <br>";
	$aux = false;
}
if($c != $_POST['us_passwd2']){
	echo "As <b>senhas</b> não são iguais!!!<br>";
	$aux = false;
}

	
	if($aux != true){
		header ("refresh:5; url=frmUser.php");
	}else{		
    $sql = "insert into usuario values(DEFAULT,?,?,md5(?),'A')";
    $resultado = $con->prepare($sql);
    $resultado->bindParam(1, $a);
    $resultado->bindParam(2, $b);
    $resultado->bindParam(3, $c);
    
    
    $resultado->execute();
     echo "<b>Usuario</b> cadastrado com sucesso!";
     header ("refresh:3; url=listarUser.php");
}
?>
