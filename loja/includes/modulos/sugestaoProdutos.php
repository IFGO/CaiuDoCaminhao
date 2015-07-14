<h3>Você também pode gostar:</h3>
<div id="accordion">
    <?php
        $sql = "SELECT * FROM categorias ORDER BY nome;";
        $categorias = mysqli_query(Conexao::getInstance(), $sql);
        while($categoria = $categorias->fetch_array()) { ?>
            <h4> <?php echo $categoria['nome']; ?> </h4>
            <div>
                <?php 
                    $sqlProdutos = "SELECT * FROM produtos WHERE idCategoria= {$categoria['id']} AND destaque=0;";
                    $produtos = mysqli_query(Conexao::getInstance(), $sqlProdutos);
                    while($produto = $produtos->fetch_array()) {?>
                        <div class="col-md-2 produto">
                            <a href="index.php?pagina=produto&id=<?php echo $produto['id']; ?>">
                                <h2><?php echo $produto['nome']; ?></h2>
                                <img src="<?php echo $produto['foto']; ?>" />
                                <p>R$ <?php echo $produto['valor']; ?></p>
                            </a>
                        </div>
                    <?php } ?>
            </div>
        <?php } ?>
</div>