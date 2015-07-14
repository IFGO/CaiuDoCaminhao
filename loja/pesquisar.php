<?php
    require_once "conexao/conexao.php";
    
    $sql = ("SELECT * FROM produtos WHERE nome LIKE '%".$_REQUEST['pesquisa']."%'");
    $resultado = mysqli_query(Conexao::getInstance(), $sql);
    
    while($produto = $resultado->fetch_array()){
	$produtos[] = $produto;        
    }

    echo json_encode($produtos);

?>
