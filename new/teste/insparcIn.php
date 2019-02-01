<?php  
#antiga T02.php
require "modelo.php";
require "connect.php"; 
$contrato2 = $_COOKIE['armaz_cont'];

/**
#busca valor total do titulo em especifico
$sql= $con->query("select con.valor as valor, cli.nome as nome from contrato con inner join cliente cli on con.idcliente=cli.id where num = '$contrato2'");
$row = $sql->fetch(PDO::FETCH_OBJ);
$valortotal = $row->valor;

#busca a soma das parcelas cadastradas
$sqlSoma = $con->query("select sum(valorparc) as soma from parcelas where numcont = '$contrato2'");
$row = $sqlSoma->fetch(PDO::FETCH_OBJ);
$soma = $row->soma;
if($soma==NULL){
	$soma = 0;
}
$diferenca = $valortotal - $soma;
**/

$parc = $_POST['par_num'];
$valorparc = $_POST['par_valor'];
$venc = $_POST['par_venc'];

#busca da data atual(emissão)
$sql=$con->query("select current_date as data");
$row = $sql->fetch(PDO::FETCH_OBJ);
$emissao = $row->data;
/**
echo $parc;
echo $valorparc;
echo $venc;
echo $emissao;
**/
#insere nova parcela
$sql = "insert into parcelas (registro, numcont, parcela, valorparc, dataemissao, datavenc) VALUES (DEFAULT, ?,?,?,?,?) ";
$res = $con->prepare($sql);
$res->bindParam(1, $contrato2);
$res->bindParam(2, $parc);
$res->bindParam(3, $valorparc);
$res->bindParam(4, $emissao);
$res->bindParam(5, $venc);
$res->execute();

header ("refresh:1; url=insparc.php");
?>