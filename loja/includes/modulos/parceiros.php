<div id="parceiros">
    <h3>Nossos Parceiros</h3>
    <div style="width: 100%; height: 50px; margin-left: auto; margin-right: auto; position: relative; top: 50%; overflow: hidden;">            
        <div id="logomarcasParceiros" style="position: absolute; height: 50px; left: -110%;">
            <?php 
                $arquivo = $requisicoes->requestScanDir("imagens/logomarcas");
                foreach($arquivo as $arquivo){  
                    if($arquivo != '.' and $arquivo != '..'){ ?>
                        <a href="#" style="margin-right: 10px;"> <img src="imagens/logomarcas/<?php echo $arquivo; ?>" height="50px"> </a>
                    <?php }
                }
            ?>
        </div>
    </div>
</div>