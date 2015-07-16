<?php
    require_once "../conexao/sql.php";
    $categorias = Conexao::getQuery(Sql::getSqlMenuAdmin());
    
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-4" style="text-align: center;">
            <a href="site.php?pagina=<?php echo $categoria['alias'];?>" <?php if($categoria['alias']==$_REQUEST['pagina'])echo "class='active'";?>><?php echo $categoria['nome'];?></a>
        </div>
    <?php } ?>
