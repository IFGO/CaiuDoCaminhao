<?php
    $requisicoes = new Requisicoes();
?>
<div class="col-md-12">
    <?php
        require $requisicoes->requestModules("slideshow");
        require $requisicoes->requestModules("parceiros");
        require $requisicoes->requestModules("produtosDestaque");
        require $requisicoes->requestModules("sugestaoProdutos");
    ?>    
</div>
