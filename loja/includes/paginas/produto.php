<?php
    // CONEXÃO PARA TESTE
    $conexao = mysqli_connect("localhost", "root", "", "caiudocaminhao");
    $sql = "SELECT * FROM produtos WHERE id = {$_GET['id']}";
    $produto = mysqli_query($conexao, $sql)->fetch_array();
?>

<div class="col-md-12">
    <div class="col-md-6">
        <img src="<?php echo $produto['foto'];?>" />
    </div>
    <div class="col-md-6">
        <h1><?php echo $produto['nome'];?></h1>
        <p>R$ <?php echo $produto['valor'];?><button>Comprar</button></p>
        <p><?php echo $produto['descricao'];?></p>
    </div>
</div>

