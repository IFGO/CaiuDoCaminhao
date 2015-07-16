<div class="col-md-12" style="padding:0;">
    <?php
        $requisicoes = new Requisicoes();
        require $requisicoes->requestModules("slideshow");
        require $requisicoes->requestModules("produtosDestaque");
        require $requisicoes->requestModules("sugestaoProdutos");
        require $requisicoes->requestModules("parceiros");
    ?>    
</div>
