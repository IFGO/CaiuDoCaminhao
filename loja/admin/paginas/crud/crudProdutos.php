<?php

require_once "../../../includes/Requisicoes.php";
require_once "../../../conexao/Conexao.php";
require_once '../../../conexao/crudGeral.php';
$requisicoes = new Requisicoes();
$crud = new crud("produtos");
$imagemUp = $requisicoes->getNomeArquivoUpload();

if (!empty($_POST['foto'])) {
    $imagemUp = $_POST['foto'];
} elseif (empty($imagemUp) || $imagemUp == null || empty($_POST['foto'])) {
    $imagemUp = $_POST['linkimg'];
}
if ($_POST['opt'] == "cadastro") {
    $campos = "";
    $valores = "";

    $campos .= ("nome,descricao,valor,foto,destaque,idCategoria");
    $valores .= "'" . $_POST['nome'] . "','" . $_POST['descricao'] . "'," . $_POST['valor'] . ",'" . $imagemUp . "'," . $_POST['destaque'] . "," . $_POST['categoria'];

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
    
    $camposvalores .= "nome = '" . $_POST["nome"] . "',";
    $camposvalores .= "descricao = '" . $_POST["descricao"] . "',";
    $camposvalores .= "valor = " . $_POST["valor"] . ",";
    $camposvalores .= "foto = '" . $imagemUp . "',";
    $camposvalores .= "destaque = " . $_POST["destaque"] . ",";
    $camposvalores .= "idCategoria = " . $_POST["categoria"] . "";

    $where = "id = " . $_POST["id"];
    $crud->atualizar($camposvalores, $where);
}
