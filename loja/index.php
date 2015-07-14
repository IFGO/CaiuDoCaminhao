<?php
require_once "includes/Requisicoes.php";
require_once "conexao/Conexao.php";
$requisicoes = new Requisicoes();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo $requisicoes->requestURL();?>favicon.ico" />
        <title>Caiu do Caminhão - Página Inicial</title>
        
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/estilo.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/jquery-ui.css" type="text/css" /> 
        
        <script src="<?php echo $requisicoes->requestURL();?>js/jquery.min.js" > </script>
        <script src="<?php echo $requisicoes->requestURL();?>js/jquery-ui.js"></script>
        <script src="<?php echo $requisicoes->requestURL();?>js/jquery.cycle.all.js"></script>
        <script src="<?php echo $requisicoes->requestURL();?>js/slideshow.js" > </script>
        <script src="<?php echo $requisicoes->requestURL();?>js/pesquisar.js" > </script>
        <script src="<?php echo $requisicoes->requestURL();?>js/parceiros.js" > </script>
    </head>
    <body>

        <header class="col-md-12">
            <div class="container">
                <div class="col-md-4">
                    <?php require $requisicoes->requestModules("logotipo"); ?>
                </div>
                <div class="col-md-4">
                    <?php require $requisicoes->requestModules("pesquisar"); ?>
                </div>
                <div class="col-md-4">
                    <?php require $requisicoes->requestModules("carrinho"); ?>
                </div>
            </div>
        </header>

        <nav class="col-md-12">
            <div class="container">
                <?php require $requisicoes->requestModules("menu"); ?>
            </div>
        </nav>
        <div class="container">
            <main class="col-md-12">
               <?php 
                    if(!isset($_GET["pagina"])) $_GET["pagina"] = null;
                    $requisicoes->requestPage($_GET["pagina"]); 
               ?>
            </main>
        </div>
        <footer class="col-md-12">
            <div class="container">
                <?php require $requisicoes->requestModules("grupo"); ?>
            </div>
        </footer>

    </body>
</html>
