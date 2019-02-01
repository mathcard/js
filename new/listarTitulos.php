<?php 
require "connect.php"; 
// INICIO seção 01 - RECEBENDO VARIAVEIS frmTitulos
if(empty($_COOKIE['gerapdf'])){

	if (empty($_POST['nome'])){
		$nome = "1";
	}else{
		$auxnome = $_POST['nome'];
		$nome =" c.nome like '%$auxnome%'";	
	}
	
	if(empty($_POST['num_cont'])){
		$num ="";
	}else{
		$auxnum = $_POST['num_cont'];
		$num ="and p.numcont = $auxnum";
	}
	
	if(empty($_POST['opcao'])){
		$opcao = " ";
		$auxop2 = 'todos';
	}else{
		$auxop = $_POST['opcao'];
		if($auxop=='abertos'){
			$auxop2 = $auxop;
			$opcao = "and p.datapg is null";
		}elseif($auxop=='baixados'){
			$opcao = "and p.datapg is not null";
			$auxop2 = $auxop;
		}
	}
	
	if(empty($_POST['venc_datainicial'])){
		$venc1 = '1900-01-01';
	}else{
		$venc1 = $_POST['venc_datainicial'];
	}
		
	if(empty($_POST['venc_datafinal'])){	
		$venc2 = '2999-12-31';
	}else{
		$venc2 = $_POST['venc_datafinal'];
	}
	$vencimento = "and p.datavenc between '$venc1' and '$venc2'";
	
	if(empty($_POST['emissao_datainicial'])){
		$emi1 = '1900-01-01';
	}else{
		$emi1 = $_POST['emissao_datainicial'];
	}
	
	if(empty($_POST['emissao_datafinal'])){
		$emi2 = '2999-12-31';
	}else{
		$emi2 = $_POST['emissao_datafinal'];
	}
	$emissao = "and p.dataemissao between '$emi1' and '$emi2'";
	
	if(empty($_POST['ord'])){
		$ord = " order by c.nome,p.parcela";
	}else{
		$auxord = $_POST['ord'];
		if($auxord=='nome'){
			$ord = " order by c.nome,p.parcela"; 
		}elseif($auxord=='num_cont'){
			$ord = " order by p.numcont,p.parcela"; 
		}elseif($auxord=='emissao'){
			$ord = " order by p.dataemissao"; 
		}elseif($auxord=='venc'){
			$ord = "order by p.datavenc";
		}elseif($auxord=='valor'){
			$ord = "order by p.valorparc desc";
		}
	} 
	$allvar ="$nome $num $opcao $vencimento $emissao $ord";
		setcookie("gerapdf", $allvar);
		setcookie("op2", $auxop2);
}else{
	$allvar = $_COOKIE['gerapdf'];
	$auxop2 = $_COOKIE['op2'];
}
require "modelo.php";
// FIM seção 01 
?>
<div align="center"><h2>Títulos a Receber<br><br></h2></div>
<div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>
<?php                    
					echo "<th>Nome</th>";
                    echo "<th>N. Contrato</th>";
					echo "<th>Parcela</th>";
					echo "<th>Emissão</th>";
					echo "<th>Vencimento</th>";
					echo "<th>Valor</th>";
					echo "<th>Observações</th>";					
                    if($auxop2=='abertos'){
						echo "<th class='actions text-center'>Ação</th>";
					}elseif($auxop2=='baixados'){
						echo "<th>Data PG</th>";
						echo "<th>Valor Recebido</th>";
						echo "<th class='actions text-center'>Usuario</th>";
						echo "<th class='actions text-center'>Ação</th>";
					}elseif($auxop2=='todos'){
						echo "<th>Data PG</th>";
						echo "<th>Valor Recebido</th>";							
						echo "<th class='actions text-center'>Usuario</th>";
					}	
?>
                </tr>
            </thead>
    </div>
	<tbody>	
<script language="JavaScript">
function confirmaestorno(){
	if(confirm('Confirma o estorno do Título?')){
		document.estorna.submit()
	}
}

function confirmabaixa(){
	if(confirm('Confirma a baixa do Título?')){
		document.baixa.submit()
	}
}

</script>
<?php							
		$sql ="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.formapg as formapg, p.datapg as datapg, p.valorreb as valorreb, u.nome as usuario from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente left join usuario u on p.userid=u.id where $allvar ";		
			
		$sql2 ="select count(p.valorparc) as qtd, sum(p.valorparc) as soma from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente where $allvar";
		$res = $con->prepare($sql2);
		$res->execute();
		$row = $res->fetchObject();
		$qtd = $row->qtd;
		$soma = $row->soma;
		if($res->rowCount() == 0){			
			header ("refresh:1; url=frmTitulos.php"); 
		}
		
		$resultado = $con->prepare($sql);
		$resultado->execute();
        while ($row = $resultado->fetchObject()) {
            $id=$row->registro;
            echo "<tr>";                      
            echo "<td><b>{$row->nome}</b></td>";
			echo "<td><b>{$row->numcont}</b></td>";
			echo "<td><b>{$row->parcela}</b></td>";
			echo "<td><b>{$row->dataemissao}</b></td>";
			echo "<td><b>{$row->datavenc}</b></td>";
			echo "<td><b>{$row->valorparc}</b></td>";
			echo "<td><b>{$row->formapg}</b></td>";					
            if($auxop2=='abertos'){			
			echo "<td>
				<form name=baixa method='post' action='baixaTitulos.php'>
					<input type='hidden' name='baixatitulo' value='$id' />
					<input type='submit' onclick='confirmabaixa()' value='Baixar' />
				</form></td>
				";		
					
			}elseif($auxop2=='baixados'){
			echo "<td><b>{$row->datapg}</b></td>";				
			echo "<td><b>{$row->valorreb}</b></td>";			
			echo "<td><b>{$row->usuario}</b></td>";		
			echo "<td>
				<form name=estorna method='post' action='estornaTitulos.php'>
				<input type='hidden' name='reg' value='$id' />
				<input type='hidden' name='opestorna' value='receber' />
				<input type='submit' onclick='confirmaestorno()' value='Estornar' />
				</form>
				";			
			}elseif($auxop2=='todos'){		
				echo "<td><b>{$row->datapg}</b></td>";				
				echo "<td><b>{$row->valorreb}</b></td>";
				echo "<td><b>{$row->usuario}</b></td>";
			}
            echo "</tr>";
            }
?>
    </tbody>
    </table>    
	<div class='table-responsive col-md-12'>
        <table class='table table-dark'>
            <thead>
                <tr>
					<th>Qt. Títulos</th>
					<th>Valor Total</th>					
                </tr>
            </thead>
    </div>
	<tbody>	
<?php
            echo "<tr>";          
            echo "<td><b>$qtd</b></td>";
			echo "<td><b>$soma R$</b></td>";
			echo "</tr>";            
?>
    </tbody>
    </table>	
    <div class="row">        
<?php		
	echo "<div class='col-sm-2'>";
		echo "<a href='pdf.php'>Gerar PDF</a>"; 
	echo "</div>";
	echo "<div class='col-sm-2'>";
		echo "<a href='excel.php'>Gerar Excel</a>"; 
	echo "</div>";
	echo "<div class='col-sm-2'>";
		echo "<a href='frmTitulos.php'>Voltar</a>"; 	
	echo "</div>";
?>
    </div>
</body>
</html>