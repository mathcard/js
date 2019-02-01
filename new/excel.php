<?php
require "connect.php"; 
$var = $_COOKIE['gerapdf'];

$tabela = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

$arquivo = 'relatorio.xls';
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename={$arquivo}" );
header ("Content-Description: PHP Generated Data" );

$sql="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.formapg as formapg, p.datapg as datapg,  p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente where $var";			
    $resultado = $con->prepare($sql);
    $resultado->execute();   

echo "<div class='table-responsive col-md-12'>
        <table class='table table-striped'>
            <thead>
                <tr>";

                    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />"; #Arumando os acentos!!!
					echo "<th>Nome</th>";
                    echo "<th>Num. Contrato</th>";
					echo "<th>Parcela</th>";
					echo "<th>Emissão</th>";
					echo "<th>Vencimento</th>";
					echo "<th>Valor</th>";
					echo "<th>Observações</th>";
					echo "<th>Data PG</th>";
					echo "<th>Valor Recebido</th>";
echo "
                </tr>
            </thead>
    </div>
	<tbody>	";

		while ($row = $resultado->fetchObject()) {
            $id=$row->registro;
			// Alterando valor com . (mysql) p/ , (excel)
			$valor=$row->valorparc;
			$valor = str_replace('.',',', $valor);
			$valorr=$row->valorreb;
			$valorr = str_replace(".",",", $valorr);
			
            echo "<tr>";                  
            echo "<td><b>{$row->nome}</b></td>";
			echo "<td><b>{$row->numcont}</b></td>";
			echo "<td><b>{$row->parcela}</b></td>";
			echo "<td><b>{$row->dataemissao}</b></td>";
			echo "<td><b>{$row->datavenc}</b></td>";
			echo "<td><b>$valor</b></td>";
			echo "<td><b>{$row->formapg}</b></td>";
			echo "<td><b>{$row->datapg}</b></td>";				
			echo "<td><b>$valorr</b></td>";		
            echo "</tr>";
            }
echo "
    </tbody>
    </table>";



?>