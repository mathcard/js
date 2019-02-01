<?php
require "connect.php"; 
$var = $_COOKIE['gerapdf'];

$tabela = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

$arquivo = 'contasapagar.xls';
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename={$arquivo}" );
header ("Content-Description: PHP Generated Data" );

$sql="SELECT c.registro AS registro, f.nome AS nome, c.numcont AS numcont, c.parcela AS parcela, c.valorparc AS valorparc, c.dataemissao AS dataemissao, c.datavenc AS datavenc, c.formapg AS formapg, c.datapg AS datapg, c.valorreb AS valorreb, u.nome AS usuario FROM contasapagar c INNER JOIN fornecedor f ON c.idforn = f.id LEFT JOIN usuario u ON c.userid = u.id where $var";			
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