<?php

require_once "../../../includes/Requisicoes.php";
require_once "../../../conexao/Conexao.php";
require_once '../../../conexao/crudGeral.php';
$requisicoes = new Requisicoes();
$crud = new crud("categorias");
if ($_POST['opt'] == "cadastro") {
    $campos = "";
    $valores = "";
    if (!empty($_POST['nome'])) {
        $campos .= "nome";
        $valores .= "'" . $_POST['nome'] . "'";
        if (!empty($_POST['descricao']) || !empty($_POST['menurel'])) {
            $campos .= ",";
            $valores .= ",";
        }
    }
    if (!empty($_POST['descricao'])) {
        $campos .= "descricao";
        $valores .= "'" . $_POST['descricao'] . "'";
        if (!empty($_POST['menurel'])) {
            $campos .= ",";
            $valores .= ",";
        }
    }
    if (!empty($_POST['menurel'])) {
        $campos .= "menu_relacionado";
        $valores .= "'" . $_POST['menurel'] . "'";
    }
    $crud->inserir($campos, $valores);
    echo "Categoria salva com sucesso!";
}
if($_POST['opt'] == "excluir"){
    $id = "";
    if (!empty($_POST['id'])) {
        $id .= $_POST['id'];
    }
    $crud->excluir("ID IN($ids)");
    echo "Excluido com sucesso!";
}
