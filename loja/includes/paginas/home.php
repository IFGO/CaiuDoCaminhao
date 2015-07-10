<?php
$func = new funcoes();
     ?>
<div class="col-md-12">
    <?php
        $dir = $func->getCaminhoAbsoluto().'slideshow';
        $arq = scandir($dir);
               
     ?>
    
    <div id="slideHome">
        
        <div id="slideHomeButton"> 
            <a href="#" class="ant">&laquo;</a>
            <a href="#" class="prox">&raquo;</a>
        </div>
        
        <ul>
            <?php
            foreach($arq as $arq){  
                if($arq != '.' and $arq != '..'){
            ?>
                <li>
                    <img src="slideshow/<?php echo $arq; ?>" alt="<?php echo $arq; ?>" />
                </li>
                <?php
                
            }
            }  
                ?>

        </ul>
    </div>
    
    
    <h5>Nossos Parceiros</h5>
    <div style="width: 100%; height: 50px; margin-left: auto; margin-right: auto; position: relative; top: 50%; overflow: hidden;">            
            <div id="logomarcasParceiros" style="position: absolute; height: 50px; left: -110%;">
                <?php 
                    $diretorio = $func->getCaminhoAbsoluto().'logomarcas';
                    $arquivo = scandir($diretorio);
                    foreach($arquivo as $arquivo){  
                        if($arquivo != '.' and $arquivo != '..'){ ?>
                            <a href="#" style="margin-right: 10px;"> <img src="logomarcas/<?php echo $arquivo; ?>" height="50px"> </a>
                        <?php }
                    }
                ?>
            </div>
    </div>
    
    <div class="col-md-12">
    <br><br><h3>Confira nossos produtos em destaque:</h3>
    <?php
        $conexao = mysqli_connect("localhost", "root", "", "caiudocaminhao");
        $sql = "SELECT * FROM produtos WHERE destaque=1;";
        $produtosDestaque = mysqli_query($conexao, $sql);
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
        
    <h3>Você também pode gostar:</h3>
    <div id="accordion">
        <?php
            $conexao = mysqli_connect("localhost", "root", "", "caiudocaminhao");
            $sql = "SELECT * FROM categorias ORDER BY nome;";
            $categorias = mysqli_query($conexao, $sql);
                while($categoria = $categorias->fetch_array()) { ?>
                    <h4> <?php echo $categoria['nome']; ?> </h4>
                    <div>
                        <?php 
                            $sqlProdutos = "SELECT * FROM produtos WHERE idCategoria= {$categoria['id']} AND destaque=0;";
                            $produtos = mysqli_query($conexao, $sqlProdutos);
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
    
</div>
