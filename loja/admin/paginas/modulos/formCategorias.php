<?php

class formCategorias {

    public function exibir($class, $idCampo = null, $nome = null, $descricao = null, $idMenu = null, $menu = null) {
        ?>
        <?php
        $query = "SELECT * FROM menu WHERE tipo = 2";
        $consulta = mysqli_query(Conexao::getInstance(), $query);
        ?>
        <form action="" method="post" class="formulario">
            <div data-role="main">
                <label>Nome:</label>
                <input type="text" class="nome" name="nome" value="<?php echo $nome; ?>" />
                <br />
                <label>Descrição</label>
                <textarea class="descricao" name="descricao"><?php echo $descricao; ?></textarea>
                <br />
                <select name="menu_relacionado" class="menurel">
                    <option value="">Selecione um menu relacionado</option>
                    <?php while ($menuOpt = mysqli_fetch_array($consulta)) { ?>
                        <?php if ($idMenu == $menuOpt['id']) { ?>
                            <option value="<?php echo $menuOpt['id'] ?>" selected><?php echo $menuOpt['nome'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $menuOpt['id'] ?>"><?php echo $menuOpt['nome'] ?></option>
                        <?php } ?>
                <?php } ?>
                </select>
                <input type="hidden" name="idHidden" class="idHidden" value="<?php echo $idCampo ?>" />
                <input type="hidden" name="nomeHidden" class="nomeHidden" value="<?php echo $nome ?>" />
                <input type="hidden" name="descricaoHidden" class="descricaoHidden" value="<?php echo $descricao ?>" />
                <input type="hidden" name="menurelHidden" class="menurelHidden" value="<?php echo $idMenu ?>" />
                <?php
                if (!$idCampo) {
                    ?>
                    <input type="submit" name="cadastrar" value="Cadastrar"  id="<?php echo $class; ?>" />
                <?php } else { ?>
                    <input type="submit" name="editar" value="Editar"  id="<?php echo $class."-".$idCampo; ?>" />    
        <?php } ?>
                <!--<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-icon-back ui-btn-icon-left" data-rel="back">Go Back</a>-->
            </div>
        </form>

        <?php
    }
}
?>
