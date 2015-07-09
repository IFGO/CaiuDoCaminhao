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
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/samsung-logo.jpg" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/motorola-logo.png" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/sony-logo.gif" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/carinhaquemoralogoali.jpg" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/android-logo.png" height="50px"> </a>                
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/dell-logo.png" height="50px"> </a>       
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/lenovo-logo.jpg" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/windowsphone_logo.png" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/hp-logo.png" height="50px"> </a>
                <a href="#" style="margin-right: 10px;"> <img src="logomarcas/lg-logo.png" height="50px"> </a>
            </div>
    </div>
    
    <div class="col-md-12 categoria">
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
        
    
</div>

    
    
</div>
