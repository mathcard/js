<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if(empty($_POST['con_num'])){
	echo "É necessario informar o <b>NÚMERO DO CONTRATO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['con_num']) > 12){
	echo "O <b>NÚMERO DO CONTRATO</b> não pode exceder 12 caracteres<br>";
	$aux = false;
}

if(empty($_POST['con_forn'])){
	echo "É necessario informar o <b>Fornecedor.</b><br>";
	$aux = false;
}

if(empty($_POST['con_bem'])){
	echo "É necessario informar o <b>Bem.</b><br>";
	$aux = false;
}

if(empty($_POST['cl_desc'])){
	echo "É necessario informar a <b>Descrição do Serviço.</b><br>";
	$aux = false;
}elseif (strlen($_POST['cl_desc']) > 80){
	echo "A <b>Descrição</b> do serviço não pode exceder 80 caracteres<br>";
	$aux = false;
}

if(empty($_POST['cl_dtexec'])){
	echo "É necessario informar a <b>Data de Execução.</b><br>";
	$aux = false;
}

if(empty($_POST['emissao'])){
	echo "É necessario informar a <b>Data de Emissão.</b><br>";
	$aux = false;
}

if(empty($_POST['parcela'])){
	echo "É necessario informar as <b>Parcelas.</b><br>";
	$aux = false;
}		

if(empty($_POST['venc'])){
	echo "É necessario informar as <b>Datas de Vencimento.</b><br>";
	$aux = false;
}	
if(empty($_POST['valor'])){
	echo "É necessario informar os <b>Valores.</b><br>";
	$aux = false;
}	
if(empty($_POST['formapg'])){
	echo "É necessario informar a <b>Forma de Pagamento.</b><br>";
	$aux = false;
}	

if($aux != true){
		header ("refresh:5; url=frmServicos.php");
	}else{	
		$contrato = $_POST['con_num'];
		$fornecedor = $_POST['con_forn'];
		$bem = $_POST['con_bem'];
		$desc = $_POST['cl_desc'];
		$dataexec = $_POST['cl_dtexec'];
		$valortotal = $_POST['cl_valor'];

		# valor das parcelas enviadas do frmParcelas
		$parcelas = array_sum($_POST['valor']);

		# descobrindo o tamanho do vetor.
		$tam = count($_POST['parcela']);

		if($parcelas!=$valortotal){
			echo "<b>O valor das parcelas digitadas, não correspondem com o valor do contrato!!!</b> ";
			header ("refresh:5; url=frmServicos.php"); 
		}else{	
			$sqlServ = "insert into servicos values (DEFAULT,?,?,?,?,?,?)";
			$res = $con->prepare($sqlServ);
			$res->bindParam(1, $contrato);
			$res->bindParam(2, $fornecedor);
			$res->bindParam(3, $bem);
			$res->bindParam(4, $desc);
			$res->bindParam(5, $dataexec);
			$res->bindParam(6, $valortotal);
			$res->execute();
			if($res->rowCount() == 0){
				echo "Houve algum <b>Erro</b> na inclusão do serviço.<br>";
				header ("refresh:3; url=frmServicos.php"); 
			}else{
				echo "Serviço cadastrado com <b>sucesso!<b><br>";
			}
			
			//Sql Inserindo as parcelas.			
			$emissao = $_POST['emissao'];	
			for($i=0; $i<$tam; $i++){
				$aux1 = $_POST['parcela'][$i];
				$aux2 = $emissao;
				$aux3 = $_POST['venc'][$i];	
				$aux4 = $_POST['valor'][$i];	
				$aux5 = $_POST['formapg'][$i];	

				$sql = "insert into contasapagar (registro, numcont, parcela, idforn, dataemissao, datavenc, valorparc, formapg) values (DEFAULT,?,?,?,?,?,?,?)";
				$res2 = $con->prepare($sql);
				$res2->bindParam(1, $contrato);
				$res2->bindParam(2, $aux1);
				$res2->bindParam(3, $fornecedor);
				$res2->bindParam(4, $aux2);
				$res2->bindParam(5, $aux3);
				$res2->bindParam(6, $aux4);
				$res2->bindParam(7, $aux5);
				$res2->execute();	
			}	
			if($res2->rowCount() == 0){
				echo "Houve algum <b>Erro</b> na inclusão das parcelas.<br>";
				header ("refresh:3; url=frmServicos.php"); 
			}else{
				echo "<b>Parcelas Cadastradas!!!</b> ";		
				header ("refresh:3; url=listarServicos.php");   	
			}
			
		}
	}
?>