<?php
require "connect.php";
	$sql = "SELECT id, nome FROM fornecedor";
	$resultado = $con->prepare($sql);
	$resultado->execute();
		
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrForn[] = array('descricao' => $linha->nome,
									'valor' => $linha->id);
	}
	echo json_encode($arrForn);
?>