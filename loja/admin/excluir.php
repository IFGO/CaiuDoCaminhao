<?php
    require_once '../conexao/conexao.php';
    require_once '../conexao/crudGeral.php';

    $crud = new crud('categorias'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $id = $_GET['id']; //pega id para exclusao caso exista
    $crud->excluir(Conexao::getInstance(),"id = $id"); // exclui o registro com o id que foi passado

    header("Location: index.php"); // redireciona para a listagem
?>