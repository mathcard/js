<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
echo "<br><br>";

$dt_inicio = '12/08/2013';
$parc = 3;
$interv = 30;
list($dia,$mes,$ano) = explode('/',$dt_inicio); // Divide a data digitada em 3 variáveis.

for ($i=0;$i<$parc;$i++) {
    // Converte a data em timestamp e formata com o date
	echo date('d/m/Y',mktime(0,0,0,$mes,$dia,$ano)).'<br/>'; 
	$vencimento = date('d/m/Y',mktime(0,0,0,$mes,$dia,$ano));
	$num_parc = $i+1;
	echo "Data = ".$vencimento."Parcela = ".$num_parc."<br>";
	
	$sql = "insert into contasapagar (registro, numcont, parcela, idforn, dataemissao, datavenc, valorparc, formapg) values (DEFAULT,?,?,?,?,?,?,?)";
		$res = $con->prepare($sql);
		$res->bindParam(1, $contrato);
		$res->bindParam(2, $num_parc);
		$res->bindParam(3, $fornecedor);
		$res->bindParam(4, $emissao);
		$res->bindParam(5, $vencimento);
		$res->bindParam(6, $valor);
		$res->bindParam(7, $formapg);
		$res->execute();			
		$dia += $interv;
}
/**

//$data = new DataTime();
$data = date("d/m/Y");
$data->modify('+1 month');
#$esp = new DataTime('$data');
echo $data->format('d-m-Y');
#echo $atual;
/*		$contrato = $_POST['con_num'];
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
	} */
?>