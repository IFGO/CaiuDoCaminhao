<?php
    $produto = mysqli_query(Conexao::getInstance(), Sql::getSqlProduto($_GET['id']))->fetch_array();
?>

<div class="col-md-12" >
    <div class="col-md-6">
        <img style="margin-top:25px;" src="<?php echo $produto['foto'];?>" />
    </div>
    <div class="col-md-6">
        <h1><?php echo $produto['nome'];?></h1>
        <h2 style="color: #EC3237;font-weight: bold;">R$ <?php echo $produto['valor'];?></h2>
        <p><button><?php echo '<a href="index.php?pagina=carrinho&acao=add&id='.$produto['id'].'">Comprar</a>'?></button></p>
        <p><?php echo $produto['descricao'];?></p>
    </div>
</div>

