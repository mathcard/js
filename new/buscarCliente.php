<?php
require "connect.php";
	$sql = "SELECT id, nome FROM cliente";
	$resultado = $con->prepare($sql);
	$resultado->execute();
		
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrCliente[] = array('descricao' => $linha->nome,
									'valor' => $linha->id);
	}
	echo json_encode($arrCliente);
?>