<?php
$func = new funcoes();
     ?>
<div class="col-md-12">
    <p>Página Principal</p>
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
                    <span><?php echo $arq; ?></span>
                    <img src="slideshow/<?php echo $arq; ?>" alt="<?php echo $arq; ?>" />
                </li>
                <?php
                
            }
            }  
                ?>

        </ul>
    </div> 
    
</div>
