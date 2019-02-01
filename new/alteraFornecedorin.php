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
	    $sql = "UPDATE fornecedor SET " .$nome ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Nome</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Nome</b> não pode exceder 50 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_aten'])) {
	if (strlen($_POST['cl_aten']) <= 40){
	    $aten="atendente='" . $_POST['cl_aten']. "' ";
	    $sql = "UPDATE fornecedor SET " .$aten ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Atendente</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Atendente</b> não pode exceder 40 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_desc'])) {
	if (strlen($_POST['cl_desc']) <= 60){
	    $desc="descricao='" . $_POST['cl_desc']. "' ";
	    $sql = "UPDATE fornecedor SET " .$desc ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Descricao</b> alterado com sucesso.<br>";
	    }else{
        	echo "A <b>Descricao</b> não pode exceder 60 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_fone1'])) {
	if (strlen($_POST['cl_fone1']) <= 15){
	    $fone1="fone1='" . $_POST['cl_fone1']. "' ";
	    $sql = "UPDATE fornecedor SET " .$fone1 ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Telefone 1</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Telefone 1</b> não pode exceder 15 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_fone2'])) {
	if (strlen($_POST['cl_fone2']) <= 15){
	    $fone2="fone2='" . $_POST['cl_fone2']. "' ";
	    $sql = "UPDATE fornecedor SET " .$fone2 ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Telefone 2</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Telefone 2</b> não pode exceder 15 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_email'])) {
	if (strlen($_POST['cl_email']) <= 80){
	    $email="email='" . $_POST['cl_email']. "' ";
	    $sql = "UPDATE fornecedor SET " .$email ." WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Email</b> alterado com sucesso.<br>";
	    }else{
        	echo "O <b>Email</b> não pode exceder 11 caracteres<br>";
	        $aux = false;
	}
}


if (!empty($_POST['cl_cep'])) {
	if(strlen($_POST['cl_cep']) == 8){
    		$cep="cep='" . $_POST['cl_cep'] . "' ";
    		$sql = "UPDATE fornecedor SET " .$cep . " WHERE id = " . $numero; 
   		$resultado = $con->prepare($sql);
	    	$resultado->execute();
	    	echo "<b>CEP</b> alterado com sucesso.<br>";
	}else{
		echo "O <b>CEP</b> deve possui 8 caracteres<br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_rua'])) {
        if (strlen($_POST['cl_rua']) <= 60){
    	    $rua="logradouro='" . $_POST['cl_rua'] . "' ";
	    $sql = "UPDATE fornecedor SET " .$rua . " WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Rua</b> alterado com sucesso.<br>";
    	}else{
        	echo "A <b>Rua</b> não deve exceder 60 caracteres. <br>";
		$aux = false;
	 }
}

if (!empty($_POST['cl_comp'])) {
	if (strlen($_POST['cl_comp']) <= 60){
	    $comp="complemento='" . $_POST['cl_comp'] . "' ";
	    $sql = "UPDATE fornecedor SET " .$comp . " WHERE id = " . $numero; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
            echo "<b>Complemento</b> alterado com sucesso.<br>";
           }else{
		echo "O <b>Complemento</b> não deve exceder 60 caracteres. <br>";
	        $aux = false;
		$var = false;
	}
}

if (!empty($_POST['cl_numend'])) {
	if (strlen($_POST['cl_numend']) <=10){
		$num="numero='" . $_POST['cl_numend'] . "' ";
		$sql = "UPDATE fornecedor SET " .$num . " WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Número</b> alterado com sucesso.<br>";
    }else{
		echo "O <b>Número</b> não deve exceder 10 caracteres. <br>";
	        $aux = false;
	}
}

if (!empty($_POST['cl_bairro'])) {
		if (strlen($_POST['cl_bairro']) <=40){
			$bairro="bairro='" . $_POST['cl_bairro'] . "' ";
			$sql = "UPDATE fornecedor SET " . $bairro . " WHERE id = " . $numero; 
			$resultado = $con->prepare($sql);
			$resultado->execute();
			echo "<b>Bairro</b> alterado com sucesso.<br>";
		}else{
			echo "O <b>Bairro</b> não deve exceder 40 caracteres. <br>";
	        $aux = false;
	}
}
				
if (!empty($_POST['cl_city'])) {
	if (strlen($_POST['cl_city']) <=50){
		$city="cidade='" . $_POST['cl_city'] . "' ";
		$sql = "UPDATE fornecedor SET " . $city . " WHERE id = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Cidade</b> alterada com sucesso.<br>";
		}else{
			echo "A <b>Cidade</b> não deve exceder 40 caracteres. <br>";
	        $aux = false;
	}
}
	if($aux==true){
		header("refresh:3; url=listarFornecedor.php");
	}else{
		header("refresh:4; url=alteraFornecedor.php?id=$numero");
	}
?>