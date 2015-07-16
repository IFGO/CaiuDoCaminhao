<div class="outros">
<h3>Outros produtos</h3>
<div id="accordion">
    <?php
        
        $categorias = Conexao::getQuery(Sql::getSqlCategorias());
        while($categoria = $categorias->fetch_array()) { ?>
            <h4> <?php echo $categoria['nome']; ?> </h4>
            <div>
                <?php 
                    $produtos = mysqli_query(Conexao::getInstance(), Sql::getSqlProdutosSemDestaque($categoria['id']));
                    while($produto = $produtos->fetch_array()) {?>
                        <div class="col-md-3 produto">
                            <a href="index.php?pagina=produto&id=<?php echo $produto['id']; ?>">
                                <h2><?php echo $produto['nome']; ?></h2>
                                <img style="width: 100%;" src="<?php echo $produto['foto']; ?>" />
                                <p>R$ <?php echo $produto['valor']; ?></p>
                            </a>
                        </div>
                    <?php } ?>
            </div>
        <?php } ?>
</div>
</div>
<div id="sobre">
    <h3>Sobre nós</h3>
    <p>Lorem ipsum dolor sit amet mollis lacinia. Praesent et enim sed urna tristique viverra. Fusce vitae metus nisi. Curabitur consequat ligula sed elit aliquam, eu dictum nibh vehicula. Nam finibus urna vitae diam laoreet lobortis. Etiam suscipit enim eget tortor ullamcorper consectetur. Nullam fringilla consequat ullamcorper. Sed lacus quam, placerat non venenatis ac, tempus a arcu.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat magna, non pellentesque massa rhoncus sit amet. Cras varius scelerisque dolor ac tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sollicitudin eros vitae mollis lacinia</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum volutpat magna, non pellentesque massa rhoncus sit amet. Cras varius scelerisque dolor ac tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sollicitudin eros vitae mollis lacinia</p>

</div>