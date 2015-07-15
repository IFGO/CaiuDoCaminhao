<?php
    $sql = "SELECT * FROM menu WHERE tipo = 1 ORDER BY nome ASC LIMIT 3";
    $categorias = mysqli_query(Conexao::getInstance(), $sql);
    
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-4" style="text-align: center;">
            <a href="site.php?pagina=<?php echo $categoria['alias'];?>"><?php echo $categoria['nome'];?></a>
        </div>
    <?php } ?>
