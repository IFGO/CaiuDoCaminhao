<?php

	//conexao
	$conexao = mysqli_connect("localhost","root","","caiudocaminhao");
	mysqli_set_charset($conexao,"utf-8");

	//consulta
	$sql = ("SELECT * FROM produtos WHERE nome LIKE "."'%".$_REQUEST['param']."%'");
	$resultado = mysqli_query($conexao,$sql);

	//tratamento do retorno
	while($produto = $resultado->fetch_array()){
		$produtos[] = $produto;        
	}
		
	echo json_encode($produtos);

?>
