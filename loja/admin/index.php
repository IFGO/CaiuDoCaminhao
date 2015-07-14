<?php
require_once "../includes/Requisicoes.php";
require_once "../conexao/Conexao.php";
$requisicoes = new Requisicoes();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="shortcut icon" href="<?php echo $requisicoes->requestURL(); ?>favicon.ico" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/bootstrap.min.css" type="text/css" />        
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/estilo.css" type="text/css" />
        <title>Caiu do Caminhão - Administração</title>
        <style>
            /* CSS PARA TESTE */
            * {
                margin: 0;
            }


            .col-md-2 img {
                width: 100%;
            }
            .col-md-4 input[type="text"] {
                width:90%;
                margin-top:50px;
            }
        </style>
    </head>
    <body>
        <header class="col-md-12">
            <div class="container">
                <div class="col-md-4">
                    <?php require $requisicoes->requestModules("logotipo"); ?>
                </div>
                <div class="col-md-4">
                    <?php // require $funcoes->requestModules("pesquisar"); ?>
                </div>
                <div class="col-md-4">
                    <?php require $requisicoes->requestModules("carrinho"); ?>
                </div>
            </div>
        </header>
        <nav class="col-md-12">                
            <div class="container">
                <?php require $requisicoes->requestModules("menuAdmin"); ?>
            </div>
        </nav>
        <div class="container">
            <main class="col-md-12">
                <?php if(!isset($_GET["pagina"])) $_GET["pagina"] = null;
                $requisicoes->requestAdminPage($_GET["pagina"]); ?>
            </main>
        </div>
        <footer class="col-md-12">
            <div class="container">
                <?php require $requisicoes->requestModules("grupo"); ?>
            </div>
        </footer>
    </body>
</html>
