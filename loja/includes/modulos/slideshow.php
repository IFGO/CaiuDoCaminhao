<?php
    $arq = $requisicoes->requestScanDir("imagens/slideshow");             
?>

<div id="slideHome"> 
    <div id="slideHomeButton"> 
        <a href="#" class="ant" id="ant">&laquo;</a>
        <a href="#" class="prox" id="prox">&raquo;</a>
    </div>
    <div id="slideImg">    
        <?php
        foreach($arq as $arq){  
            if($arq != '.' and $arq != '..'){ ?>                
                <img src="imagens/slideshow/<?php echo $arq; ?>" alt="<?php echo $arq; ?>" /> 
            <?php }
        } ?>
    </div>    
</div>