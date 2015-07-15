<div class="col-md-12" style="padding:0;">
    <h2 id="chamada">As melhores ofertas você encontra aqui!</h1>
    <?php
        
        $produtosDestaque = mysqli_query(Conexao::getInstance(), Sql::getSqlProdutosDestaque());
        if($produtosDestaque->num_rows > 0) {
            $arrayProdutos = array();
            while($destaque = $produtosDestaque->fetch_array()) {
                $arrayProdutos[] = $destaque;
            }
            $numerosAleatorios = range(0, ($produtosDestaque->num_rows - 1));
            shuffle($numerosAleatorios);
            for($i = 0; $i < $produtosDestaque->num_rows; $i++) { ?>
                <div class="col-md-2 produto">
                    <a style="text-decoration: none; color: black;" href="index.php?pagina=produto&id=<?php echo $arrayProdutos[$numerosAleatorios[$i]]['id']; ?>">
                        <h2> <?php echo $arrayProdutos[$numerosAleatorios[$i]]['nome']; ?> </h2>
                        <img src=" <?php echo $arrayProdutos[$numerosAleatorios[$i]]['foto']; ?> ">
                        <p> R$<?php echo $arrayProdutos[$numerosAleatorios[$i]]['valor']; ?> </p>
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
</div>