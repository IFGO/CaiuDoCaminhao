<?php
    $sql = "SELECT * FROM produtos WHERE id = {$_GET['id']}";
    $produto = mysqli_query(Conexao::getInstance(), $sql)->fetch_array();
?>

<div class="col-md-12">
    <div class="col-md-6">
        <img src="<?php echo $produto['foto'];?>" />
    </div>
    <div class="col-md-6">
        <h1><?php echo $produto['nome'];?></h1>
        <p>R$ <?php echo $produto['valor'];?><?php echo '<button><a href="index.php?pagina=carrinho&acao=add&id='.$produto['id'].'">Comprar</a>'?></button></p>
        <p><?php echo $produto['descricao'];?></p>
    </div>
</div>

