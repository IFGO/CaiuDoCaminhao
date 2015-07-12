<?php
//ini_set("display_errors", "On");
include "includes/funcoes/funcoes.php";
$funcoes = new funcoes();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo $funcoes->requestUrl();?>favicon.ico" />
        <script src="<?php echo $funcoes->requestUrl();?>js/jquery.min.js" > </script>
        <link rel="stylesheet" href="<?php echo $funcoes->requestUrl(); ?>css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $funcoes->requestUrl(); ?>css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $funcoes->requestUrl(); ?>css/estilo.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $funcoes->requestUrl(); ?>css/jquery-ui.css" type="text/css" /> 
        <script src="<?php echo $funcoes->requestUrl();?>js/jquery-ui.js"></script>
        <script src="<?php echo $funcoes->requestUrl();?>js/jquery.cycle.all.js"></script>
        <title>Caiu do Caminhão - Página Inicial</title>
        <script>            
            $(document).ready(function(){
                $("#accordion").accordion();
                animarLogomarcasParceiros();
                function animarLogomarcasParceiros(){
                    $("#logomarcasParceiros").animate({left: '0%'}, 10000);
                    $("#logomarcasParceiros").animate({left: '-50%'}, 10000, animarLogomarcasParceiros);
                }                
            });
        </script>
        <script type="text/javascript">              
            var ajax = function(){
				//buscar valor digitado
                var busca = $('#busProduto').val();
                
				$.ajax({                   
                   url: 'requisicao.php?',
                   type: 'GET',
                   data: "param="+busca,
                   dataType: 'json',
                            
                }).done(function(data){
					var response = [];
					response = data;
					document.getElementById("lista").innerHTML = "";
					
					for(i = 0; i < response.length; i++){					

                                                document.getElementById("lista").innerHTML += '<div><a href="index.php?pagina=produto&id=' + response[i].id +'"><img style="width:50px;" src="' + response[i].foto + '" />' + response[i].nome +'</a></div>';				
					}					
                });               
            };
        </script>
        
        <script>
            $('#slideImg').cycle({
                fx: 'scrollRight',
                speed: 300,
                next: '#prox',
                prev: '#ant'
            });
        </script>
            
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
                    <?php require $funcoes->requestModules("logotipo"); ?>
                </div>
                <div class="col-md-4">
                    <?php require $funcoes->requestModules("pesquisar"); ?>
                </div>
                <div class="col-md-4">
                    <?php require $funcoes->requestModules("carrinho"); ?>
                </div>
            </div>
        </header>

        <nav class="col-md-12">
            <div class="container">
                <?php require $funcoes->requestModules("menu"); ?>
            </div>
        </nav>
        <div class="container">
            <main class="col-md-12">
               <?php 
                    if(!isset($_GET["pagina"])) $_GET["pagina"] = null;
                    $funcoes->requestPage($_GET["pagina"]); 
               ?>
            </main>
        </div>
        <footer class="col-md-12">
            <div class="container">
                <?php require $funcoes->requestModules("grupo"); ?>
            </div>
        </footer>

    </body>
</html>
