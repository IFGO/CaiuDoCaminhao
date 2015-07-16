<?php

class formProdutos {

    public function exibir($class, $idCampo = null, $nome = null, $descricao = null, $idCat = null, $cat = null, $imagem = null, $destaque = null) {
        ?>
        <?php
        $query = "SELECT * FROM categorias";
        $consulta = mysqli_query(Conexao::getInstance(), $query);
        ?>
        <form action="paginas/upload.php" method="post" class="formulario">
            <div data-role="main">
                <label>Nome:</label>
                <input type="text" class="nome" name="nome" value="<?php echo $nome; ?>" />
                <br />
                <label>Descrição</label>
                <textarea class="descricao" name="descricao"><?php echo $descricao; ?></textarea>
                <br />
                <label>Valor:</label>
                <input type="text" class="valor" name="valor" value="<?php echo $valor; ?>" placeholder="R$ 00,00" />
                <br />
                <label>Link foto:</label>
                <input type="text" name="linkimg" class="linkimg" >
                <br />
                <label>Imagem:</label>
                <input type="file" name="imagem" class="imagem" >
                <br />
                <label>Destaque:</label>
                <input type="radio" name="destaque" value="0" class="destaque">Não<br>
                <input type="radio" name="destaque" value="1" class="destaque">Sim
                <br />
                <select name="categoria" class="categoria">
                    <option value="">Selecione uma categoria</option>
                    <?php while ($catOpt = mysqli_fetch_array($consulta)) { ?>
                        <?php if ($idCat == $catOpt['id']) { ?>
                            <option value="<?php echo $catOpt['id'] ?>" selected><?php echo $catOpt['nome'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $catOpt['id'] ?>"><?php echo $catOpt['nome'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <input type="hidden" name="idHidden" class="idHidden" value="<?php echo $idCampo ?>" />
                <input type="hidden" name="nomeHidden" class="nomeHidden" value="<?php echo $nome ?>" />
                <input type="hidden" name="descricaoHidden" class="descricaoHidden" value="<?php echo $descricao ?>" />
                <input type="hidden" name="valorHidden" class="valorHidden" value="<?php echo $valor ?>" />
                <input type="hidden" name="linkimgHidden" class="imagemHidden" value="<?php echo $imagem ?>" />
                <input type="hidden" name="imagemHidden" class="imagemHidden" value="<?php echo $imagem ?>" />
                <input type="hidden" name="destaqueHidden" class="destaqueHidden" value="<?php echo $destaque ?>" />
                <input type="hidden" name="categoriaHidden" class="categoriaHidden" value="<?php echo $idCat ?>" />
                <?php
                if (!$idCampo) {
                    ?>
                    <input type="submit" name="cadastrar" value="Cadastrar"  id="<?php echo $class; ?>" />
                <?php } else { ?>
                    <input type="submit" name="editar" value="Editar"  id="<?php echo $class . "-" . $idCampo; ?>" />    
                <?php } ?>
                <!--<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left" data-rel="back">Go Back</a>-->
            </div>
        </form>

        <?php
    }

}
?>
