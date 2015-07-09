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
        <title>Caiu do Caminhão - Página Inicial</title>
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
        <script type="text/javascript">
            //slide show
            $(function(){            
                var velocidade = 3500;
                var rotate = setInterval(auto, velocidade);
                var larguraLi = $("#slideHome ul li").outerWidth(); // pegar a largura do li 
            
                //mostra os botoes
                $("#slideHome").hover(function(){
                    $("#slideHomeButton").fadeIn();
                },function(){
                    $("#slideHomeButton").fadeOut();
                });
                               
                // botao proximo
                $(".prox").click(function(e){
                    e.preventDefault();
                    $("#slideHome ul").css({'width':'99999%'}).animate({left:-larguraLi}, function(){
                        $("#slideHome ul li").last().after($("#slideHome ul li").first());
                        $(this).css({'left':'0','width':'auto'});
                      });
                    });
                
                // botao voltar
                $('.ant').click(function(e){
                    e.preventDefault();    $("#slideHome ul li").first().before($("#slideHome ul li").last().css({'margin-left':-larguraLi}));
                    $("#slideHome ul").css({'width':'99999%'}).animate({left:larguraLi},function(){
                        $("#slideHome ul li").first().css({'margin-left':'0'});
                        $(this).css({'left':'0','width':'auto'})
                    });
                });
                
                //passagem de slides
                function auto(){
                    $('.prox').click();
               };               
          });
          
        </script> 
            
       <style      
        
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
