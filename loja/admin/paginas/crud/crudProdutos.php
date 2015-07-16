<?php

require_once "../../../includes/Requisicoes.php";
require_once "../../../conexao/Conexao.php";
require_once '../../../conexao/crudGeral.php';
$requisicoes = new Requisicoes();
$crud = new crud("produtos");
$imagemUp = $requisicoes->getNomeArquivoUpload();

if(empty($imagemUp)||$imagemUp==null){
    $imagemUp = $_POST['linkimg'];
}
if ($_POST['opt'] == "cadastro") {
    $campos = "";
    $valores = "";

    $campos .= ("nome,descricao,valor,foto,destaque,idCategoria");
    $valores .= "'" . $_POST['nome'] . "','" . $_POST['descricao'] . "'," . $_POST['valor'] . ",'" . $imagemUp . "'," . $_POST['destaque']. "," . $_POST['categoria'];

    $crud->inserir($campos, $valores);
}

if ($_POST['opt'] == "excluir") {
    $id = "";
    if (!empty($_POST['id'])) {
        $ids .= $_POST['id'];
        $crud->excluir("ID IN($ids)");
    }
}

if ($_POST['opt'] == "editar") {
    $camposvalores = "";
    $where = "";
    if (!empty($_POST['nome'])) {
        $camposvalores .= "nome = '" . $_POST["nome"] . "'";
        if (!empty($_POST['descricao']) || !empty($_POST['menurel'])) {
            $camposvalores .= ",";
        }
    }
    if (!empty($_POST['descricao'])) {
        $camposvalores .= "descricao = '" . $_POST['descricao'] . "'";
        if (!empty($_POST['menurel'])) {
            $camposvalores .= ",";
        }
    }
    if (!empty($_POST['menurel'])) {
        $camposvalores .= "menu_relacionado = " . $_POST['menurel'];
    }
    $where = "id = " . $_POST["id"];
    $crud->atualizar($camposvalores, $where);
}
