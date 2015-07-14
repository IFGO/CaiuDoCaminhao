<?php
    require_once '../conexao/conexao.php';
    require_once '../conexao/crudGeral.php';

    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    $crud = new crud('categorias'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $id = $_GET['id']; //pega id para exclusao caso exista
    $crud->excluir($con->getConexao(),"id = $id"); // exclui o registro com o id que foi passado

    $con->disconnect(); // fecha a conexao

    header("Location: index.php"); // redireciona para a listagem
?>