<div class="col-md-12">
    <br><br><h3>Confira nossos produtos em destaque:</h3>
    <?php
        $sql = "SELECT * FROM produtos WHERE destaque=1;";
        $produtosDestaque = mysqli_query(Conexao::getInstance(), $sql);
        if($produtosDestaque->num_rows > 0) {
            $arrayProdutos = array();
            while($destaque = $produtosDestaque->fetch_array()) {
                $arrayProdutos[] = $destaque;
            }
            $numerosAleatorios = range(0, ($produtosDestaque->num_rows - 1));
            shuffle($numerosAleatorios);
            for($i = 0; $i < $produtosDestaque->num_rows; $i++) { ?>
                <div class="col-md-2 produto" style="background-color: #F0F8FF; margin-right: 4px;">
                    <a style="text-decoration: none; color: black;" href="index.php?pagina=produto&id=<?php echo $arrayProdutos[$numerosAleatorios[$i]]['id']; ?>">
                        <h2> <?php echo $arrayProdutos[$numerosAleatorios[$i]]['nome']; ?> </h2>
                        <img src=" <?php echo $arrayProdutos[$numerosAleatorios[$i]]['foto']; ?> ">
                        <p> R$<?php echo $arrayProdutos[$numerosAleatorios[$i]]['valor']; ?> </p>
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
</div>