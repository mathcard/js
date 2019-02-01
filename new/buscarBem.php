<?php
require "connect.php";
	$sql = "SELECT id, nome FROM bem";
	$resultado = $con->prepare($sql);
	$resultado->execute();
		
	while( $linha = $resultado->fetch(PDO::FETCH_OBJ) ){
		$arrBem[] = array('descricao' => $linha->nome,
									'valor' => $linha->id);
	}
	echo json_encode($arrBem);
?>