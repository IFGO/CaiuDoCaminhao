<?php
require_once '../conexao/conexao.php';
require_once '../conexao/crudGeral.php';

$con = new conexao(); // instancia classe de conexao
$con->connect(); // abre conexao com o banco    
?>



<div class="comands col-md-6">            
    <div class="col-md-2">
        <a class="btn btn-mini btn-success" data-rel="popup" href="#myPopup-new"><span class="glyphicon glyphicon-plus-sign"></span> Novo</a>

        <div data-role="popup" id="myPopup-new" class="ui-content" data-dismissible="false" style="width:600px;height: 600px; left: 50%;">
            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
            <form action="" method="post" class="formulario"><!--   formulario carrega a si mesmo com o action vazio  -->
                <div data-role="main">
                    <label>Nome:</label>
                    <input type="text" name="nome" value="<?php echo $campo['nome']; // trazendo campo preenchido caso esteja no modo de ediçao              ?>" />
                    <br />
                    <label>Descrição</label>
                    <textarea name="descricao"><?php echo $campo['descricao']; ?></textarea>
                    <br />
                    <input type="hidden" name="idEdit" class="idEdit-<?php echo $campo['id']; ?>" value="<?php echo $campo['id']; ?>">
                    <?php
                    if (!$campo['id']) { // se nao passar o id via GET nao está editando, mostra o botao de cadastro
                        ?>
                        <input type="submit" name="cadastrar" value="Cadastrar" />
                    <?php } else { // se  passar o id via GET  está editando, mostra o botao de ediçao  ?>
                        <input type="submit" name="editar" value="Editar" id="bntEdit-<?php echo $campo['id']; ?>" />    
                    <?php } ?>
                    <!--<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left" data-rel="back">Go Back</a>-->
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2">
        <a  class="btn btn-small btn-danger" href="formulario.php"><span class="glyphicon glyphicon-check"></span> Excluir</a>
    </div>
</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="success">
            <th>Nome</th>
            <th>Descrição</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Excluir</th>
            <th style="text-align: center">
                <span class="glyphicon glyphicon-check"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $consulta = mysqli_query($con->getConexao(), "SELECT * FROM categorias");
        while ($campo = mysqli_fetch_array($consulta)) { // laço de repetiçao que vai trazer todos os resultados da consulta
            ?>
            <tr>
                <td>
                    <?php echo $campo['nome']; // mostrando o campo NOME da tabela  ?>
                </td>
                <td>
                    <?php echo $campo['descricao']; // mostrando o campo DESCRICAO da tabela  ?>
                </td>
                <td style="text-align: center">
                    <div class="editar">
                        <a href="#myPopup-<?php echo $campo['id']; ?>" data-rel="popup" class="">
                            <div class="edit" id="idCat-<?php echo $campo['id']; //pega o campo ID para a ediçao               ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </div>
                        </a>
                        <div data-role="popup" id="myPopup-<?php echo $campo['id']; ?>" class="ui-content" data-dismissible="false" style="max-width:600px;max-height: 600px">
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                            <form action="" method="post" class="formulario"><!--   formulario carrega a si mesmo com o action vazio  -->
                                <div data-role="main">
                                    <label>Nome:</label>
                                    <input type="text" name="nome" value="<?php echo $campo['nome']; // trazendo campo preenchido caso esteja no modo de ediçao              ?>" />
                                    <br />
                                    <label>Descrição</label>
                                    <textarea name="descricao"><?php echo $campo['descricao']; ?></textarea>
                                    <br />
                                    <input type="hidden" name="idEdit" class="idEdit-<?php echo $campo['id']; ?>" value="<?php echo $campo['id']; ?>">
                                    <?php
                                    if (!$campo['id']) { // se nao passar o id via GET nao está editando, mostra o botao de cadastro
                                        ?>
                                        <input type="submit" name="cadastrar" value="Cadastrar" />
                                    <?php } else { // se  passar o id via GET  está editando, mostra o botao de ediçao  ?>
                                        <input type="submit" name="editar" value="Editar" id="bntEdit-<?php echo $campo['id']; ?>" />    
                                    <?php } ?>
                                    <!--<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left" data-rel="back">Go Back</a>-->
                                </div>
                            </form>

                            <div data-role="popup" id="myPopup-<?php echo $campo['id']; ?>" class="ui-content" data-dismissible="false" style="max-width:600px;max-height: 600px">
                                <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                                <form action="" method="post" class="formulario"><!--   formulario carrega a si mesmo com o action vazio  -->
                                    <div data-role="main">
                                        <label>Nome:</label>
                                        <input type="text" name="nome" value="<?php echo $campo['nome']; // trazendo campo preenchido caso esteja no modo de ediçao              ?>" />
                                        <br />
                                        <label>Descrição</label>
                                        <textarea name="descricao"><?php echo $campo['descricao']; ?></textarea>
                                        <br />
                                        <input type="hidden" name="idEdit" class="idEdit-<?php echo $campo['id']; ?>" value="<?php echo $campo['id']; ?>">
                                        <?php
                                        if (!$campo['id']) { // se nao passar o id via GET nao está editando, mostra o botao de cadastro
                                            ?>
                                            <input type="submit" name="cadastrar" value="Cadastrar" />
                                        <?php } else { // se  passar o id via GET  está editando, mostra o botao de ediçao  ?>
                                            <input type="submit" name="editar" value="Editar" id="bntEdit-<?php echo $campo['id']; ?>" />    
                                        <?php } ?>
                                        <!--<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left" data-rel="back">Go Back</a>-->
                                    </div>
                                </form>
                                <?php
                                echo "<script>
    $(document).ready(function () {
        $('#bntEdit-" . $campo['id'] . "').click(function (e) {
            e.preventDefault();
//            $('#myPopup-" . $campo['id'] . " .formulario').submit(function () {
                $.ajax({
                    type: 'POST',
                    url: 'formulario?acao=edit',
                    data: {
                        id: $(this).parent().siblings('.idEdit-" . $campo['id'] . "').val()
                    }
//                });
            });
        });
    });
</script>";
                                ?>

                            </div>
                        </div>
                </td>
                <td style="text-align: center">
                    <a href="excluir.php?id=<?php echo $campo['id'];  //pega o campo ID para a exclusao               ?>" id="excluir">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
                <td style="text-align: center">
                    <input class="checkbox" type="checkbox" name="<?php echo $campo['id']; ?>" /> 
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php $con->disconnect(); // fecha conexao com o banco  ?>
<?php
//apenas testando a conexao
if ($con->connect() == true) {
    echo '<small><span class="glyphicon glyphicon-ok-sign"></span><strong class="text-success"> Conexão estável com o Banco de Dados</strong></small>';
} else {
    echo '<small><span class="glyphicon glyphicon-remove-sign"></span><strong class="text-danger"> Sem conexão com o Banco de Dados</strong></small>';
//    echo 'Não conectou';
}
?>
