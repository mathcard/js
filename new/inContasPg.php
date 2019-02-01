<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;
if(empty($_POST['con_num'])){
	echo "É necessario infomrar a <b>Número do Contrato</b>.<br>";
	$aux = false;
}elseif (strlen($_POST['con_num']) > 50){
	echo "O <b>Número do Contrato</b> não deve exceder 12 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['con_forn'])){
	echo "É necessario infomrar o <b>Fornecedor</b>.<br>";
	$aux = false;
}

if(empty($_POST['opcao_parcela'])){	
	$aux = false;
}elseif ($_POST['opcao_parcela']=="manual"){
	if(empty($_POST['parcela'])){
			echo "É necessario infomrar a <b>Parcela</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['emissao'])){
		echo "É necessario infomrar a <b>Data de Emissão</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['venc'])){
		echo "É necessario infomrar a <b>Data de Vencimento</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['valor'])){
		echo "É necessario infomrar o <b>Valor</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['formapg'])){
		echo "É necessario infomrar a <b>Forma de Pagamento</b>.<br>";
		$aux = false;
	}
}elseif ($_POST['opcao_parcela']=="auto"){
	if(empty($_POST['cl_emissao'])){
		echo "É necessario infomrar a <b>Data de Emissão</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['parc1'])){
		echo "É necessario infomrar a <b>Data da Primeira Parcela</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['parcelas'])){
		echo "É necessario infomrar a <b>Quantidade de Parcelas</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['intervalo'])){
		echo "É necessario infomrar o <b>Intervalo entre as parcelas</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['valorparc'])){
		echo "É necessario infomrar a <b>O valor das Parcelas</b>.<br>";
		$aux = false;
	}
	if(empty($_POST['formapg'])){
		echo "É necessario infomrar a <b>Forma de Pagamento</b>.<br>";
		$aux = false;
	}elseif (strlen($_POST['formapg']) > 20){
	echo "A <b>Forma de Pagamento</b> não deve exceder 20 caracteres.<br>";
	$aux = false;
	}
}

if($aux != true){
		echo "aux = falso";
		header ("refresh:5; url=frmContasPg.php");
	}else{
		$opcao = $_POST['opcao_parcela'];
		$contrato = $_POST['con_num'];
		$fornecedor = $_POST['con_forn'];
		if($opcao=="manual"){			
			$emissao = $_POST['emissao'];				
			# descobrindo o tamanho do vetor.
			$tam = count($_POST['parcela']);						
			for($i=0; $i<$tam; $i++){
				$aux1 = $contrato;
				$aux2 = $fornecedor;
				$aux3 = $_POST['parcela'][$i];				
				$aux4 = $emissao;
				$aux5 = $_POST['venc'][$i];	
				$aux6 = $_POST['valor'][$i];	
				$aux7 = $_POST['formapg'][$i];	

				$sql = "insert into contasapagar (registro, numcont, idforn, parcela, dataemissao, datavenc, valorparc, formapg) values (DEFAULT,?,?,?,?,?,?,?)";
				$res = $con->prepare($sql);
				$res->bindParam(1, $aux1);
				$res->bindParam(2, $aux2);
				$res->bindParam(3, $aux3);
				$res->bindParam(4, $aux4);
				$res->bindParam(5, $aux5);
				$res->bindParam(6, $aux6);
				$res->bindParam(7, $aux7);
				$res->execute();	
			}if($res->rowCount() == 0){
				echo "Houve algum <b>Erro</b> na inclusão das parcelas.<br>";
				header ("refresh:3; url=frmContasPg.php"); 
			}else{
				echo "<b>Parcelas Cadastradas!!!</b> ";		
				header ("refresh:3; url=frmTitulosPg.php");  
			}
		}elseif($opcao=="auto"){
			$emissao = $_POST['cl_emissao'];
			$valor = $_POST['valorparc'];
			$formapg = $_POST['formapg'];
			$dt_inicio = $_POST['parc1'];
			//$dt_inicio = '12/05/2018';
			$parc = $_POST['parcelas'];
			$interv = $_POST['intervalo'];			
			list($ano,$mes,$dia) = explode('-',$dt_inicio); // Divide a data digitada em 3 variáveis.			
			
			for ($i=0;$i<$parc;$i++) {
				// Converte a data em timestamp e formata com o date								
				$vencimento = date('Y-m-d',mktime(0,0,0,$mes,$dia,$ano));
				$num_parc = $i+1;
					
				$sql = "insert into contasapagar (registro, numcont, idforn, parcela, dataemissao, datavenc, valorparc, formapg) values (DEFAULT,?,?,?,?,?,?,?)";
				$res = $con->prepare($sql);
				$res->bindParam(1, $contrato);
				$res->bindParam(2, $fornecedor);
				$res->bindParam(3, $num_parc);				
				$res->bindParam(4, $emissao);
				$res->bindParam(5, $vencimento);
				$res->bindParam(6, $valor);
				$res->bindParam(7, $formapg);
				$res->execute();			
				$dia += $interv;				
			}if($res->rowCount() == 0){
				echo "Houve algum <b>Erro</b> na inclusão das parcelas.<br>";
				header ("refresh:3; url=frmContasPg.php"); 
			}else{
				echo "<b>Parcelas Cadastradas!!!</b> ";		
				header ("refresh:3; url=frmTitulosPg.php");  
			}				
		}
/*
FUNÇÃO ORIGNAL P/ AUMENTAR OS DIAS.
$dt_inicio = '12/08/2013';
$parc = 3;
$interv = 30;
list($dia,$mes,$ano) = explode('/',$dt_inicio); // Divide a data digitada em 3 variáveis.

for ($i=0;$i<$parc;$i++) {
    // Converte a data em timestamp e formata com o date
	echo date('d/m/Y',mktime(0,0,0,$mes,$dia,$ano)).'<br/>'; 
	$vencimento = date('d/m/Y',mktime(0,0,0,$mes,$dia,$ano));
	$num_parc = $i+1;
	$dia += $interv;
} 
*/
}
?>