<?php
    $sql = "SELECT * FROM menu WHERE tipo = 1 ORDER BY nome ASC LIMIT 6";
    $categorias = mysqli_query(Conexao::getInstance(), $sql);
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-4" style="text-align: center;">
            <a href="index.php?pagina=<?php echo $categoria['alias'];?>"><?php echo $categoria['nome'];?></a>
        </div>
    <?php } ?>
