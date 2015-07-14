<?php
    $sql = "SELECT * FROM menu WHERE tipo = 2 ORDER BY nome ASC LIMIT 6";
    $categorias = mysqli_query(Conexao::getInstance(), $sql);
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-2">
            <a href="index.php?pagina=categoria&id=<?php echo $categoria['link'];?>"><?php echo $categoria['nome'];?></a>
        </div>
    <?php }
