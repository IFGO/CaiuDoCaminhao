<?php
    $categoria = mysqli_query(Conexao::getInstance(), Sql::getSqlCategoria($_GET['id']))->fetch_array();
?>

<div class="col-md-12 categoria">
    <h1><?php echo $categoria['nome'];?></h1>
    <p><?php echo $categoria['descricao'];?></p>
    <?php
        
        $produtos = mysqli_query(Conexao::getInstance(), Sql::getSqlCategoriaProduto($_GET['id']));
        while($produto = $produtos->fetch_array()) { ?>
            <div class="col-md-2 produto">
                <a href="index.php?pagina=produto&id=<?php echo $produto['id']; ?>">
                    <h2><?php echo $produto['nome']; ?></h2>
                    <img src="<?php echo $produto['foto']; ?>" />
                    <p>R$ <?php echo $produto['valor']; ?></p>
                </a>
            </div>
        <?php } ?>
</div>
