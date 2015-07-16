<?php
include_once "modulos/formProdutos.php";
$form = new formProdutos();
$requisicoes = new Requisicoes();
?>

<script src="<?php echo $requisicoes->requestURL();?>js/cadProdutos.js" > </script>
<h2>Produtos</h2>
<p>Gerencie os produtos da loja</p>
<div class="" id="mensagem"></div>
<div class="" id="visualizar"></div>

<div class="comands col-md-12">            
    <div class="col-md-1">
        <a  class="btn btn-small btn-danger" href="#" id="btnExcluir"><span class="glyphicon glyphicon-check"></span> Excluir</a>
    </div>
    <div class="col-md-1">
        <a class="btn btn-mini btn-success" data-rel="popup" href="#myPopup-new"><span class="glyphicon glyphicon-plus-sign"></span> Novo</a>

        <div data-role="popup" id="myPopup-new" class="ui-content" data-dismissible="false" style="width:600px;min-height: 600px; left: -50%;">
            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>            
<?php $form->exibir("btnCadastrar"); ?>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="success">
            <th>Nome</th>
            <th>Descrição</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center; width: 90px;"><span class="glyphicon glyphicon-check"></span> Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $consulta = Conexao::getQuery(Sql::getProdutosAdmin());
        while ($campo = mysqli_fetch_array($consulta)) { // laço de repetiçao que vai trazer todos os resultados da consulta
            ?>
            <tr>
                <td>
    <?php echo $campo['nome']; // mostrando o campo NOME da tabela    ?>
                </td>
                <td>
    <?php echo $campo['descricao']; // mostrando o campo DESCRICAO da tabela    ?>
                </td>
                <td style="text-align: center">
                    <div class="editar">
                        <a href="#myPopup-<?php echo $campo['id']; ?>" data-rel="popup" class="">
                            <div class="edit" id="idCat-<?php echo $campo['id']; //pega o campo ID para a ediçao                              ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </div>
                        </a>
                        <div data-role="popup" id="myPopup-<?php echo $campo['id']; ?>" class="ui-content" data-dismissible="false" style="max-width:600px;min-height: 600px">
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>

                            <?php $form->exibir("bntEdit", $campo['id'], $campo['nome'], $campo['descricao'], $campo['idCategoria'], $campo['valor'], $campo['foto'], $campo['nome_categoria'], $campo['destaque']); ?>

                            <?php
                            $classe = 'class="success text-success mensagem-sucesso"';
                            echo "
                                <script>
                                    $(document).ready(function () {
                                        $('#myPopup-" . $campo['id'] . " .nome').keyup(function () {
                                            $('#myPopup-" . $campo['id'] . " .nomeHidden').val($('#myPopup-" . $campo['id'] . " .nome').val());
                                        });
                                        $('#myPopup-" . $campo['id'] . " .descricao').keyup(function () {
                                            $('#myPopup-" . $campo['id'] . " .descricaoHidden').val($('#myPopup-" . $campo['id'] . " .descricao').val());
                                        });
                                        $('#myPopup-" . $campo['id'] . " .valor').keyup(function () {
                                            $('#myPopup-" . $campo['id'] . " .valorHidden').val($('#myPopup-" . $campo['id'] . " .valor').val());
                                        });
                                        $('#myPopup-" . $campo['id'] . " .linkimg').keyup(function () {
                                            $('#myPopup-" . $campo['id'] . " .linkimgHidden').val($('#myPopup-" . $campo['id'] . " .linkimg').val());
                                        });
                                        $('#myPopup-" . $campo['id'] . " .destaque').change(function () {
                                            $('#myPopup-" . $campo['id'] . " .destaqueHidden').val($('#myPopup-" . $campo['id'] . " input[name=destaque]:checked').val());
                                        });
                                        $('#myPopup-" . $campo['id'] . " .categoria').change(function () {
                                            $('#myPopup-" . $campo['id'] . " .categoriaHidden').val($('#myPopup-" . $campo['id'] . " .categoria :selected').val());
                                        });

                                        $('#bntEdit-" . $campo['id'] . "').click(function (e) {
                                            e.preventDefault();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'paginas/crud/crudProdutos.php',
                                                data: {
                                                    id: $(this).parent().siblings('.idHidden').val(),
                                                    nome: $(this).parent().siblings('.nomeHidden').val(),
                                                    descricao: $(this).parent().siblings('.descricaoHidden').val(),
                                                    destaque: $(this).parent().siblings('.destaqueHidden').val(),
                                                    linkimg: $(this).parent().siblings('.linkimgHidden').val(),
                                                    foto: $(this).parent().siblings('.imagemHidden').val(),
                                                    valor: $(this).parent().siblings('.valorHidden').val(),
                                                    categoria: $(this).parent().siblings('.categoriaHidden').val(),
                                                    opt: 'editar'
                                                },
                                                success: function (data) {
                                                    $('#mensagem').html('<div " . $classe . ">'+data+'</div>');
                                                }
                                            });
                                        });
                                    });
                                </script>
                                ";
                            ?>

                        </div>
                    </div>
                </td>
                <td style="text-align: center">
                    <input class="checkbox" type="checkbox" name="excluir[]" value="<?php echo $campo['id']; ?>" /> <span class="sep-id"> | id:<?php echo $campo['id']; ?></span> 
                </td>
            </tr>
<?php } ?>
    </tbody>
</table>
<?php
//apenas testando a conexao
if (Conexao::getInstance() != null) {
    echo '<small><span class="glyphicon glyphicon-ok-sign"></span><strong class="text-success"> Conexão estável com o Banco de Dados</strong></small>';
} else {
    echo '<small><span class="glyphicon glyphicon-remove-sign"></span><strong class="text-danger"> Sem conexão com o Banco de Dados</strong></small>';
//    echo 'Não conectou';
}
?>
