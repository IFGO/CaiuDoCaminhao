<?php
//ini_set("display_errors", "On");
require_once "../includes/Requisicoes.php";
require_once "../conexao/Conexao.php";
$requisicoes = new Requisicoes();
?>

<?php
    //validar a existência de sessão
    session_start(); 
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){ 
        unset($_SESSION['login']); 
        unset($_SESSION['senha']); 
        header('location:index.php');         
    } 
    $logado = $_SESSION['login']; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo $requisicoes->requestURL();?>favicon.ico" />
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Caiu do Caminhão - Administração</title>
        
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://malsup.github.io/jquery.form.js"></script>

        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/estilo.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $requisicoes->requestURL(); ?>css/jquery-ui.css" type="text/css" /> 

    </head>
    <body>
        <header class="col-md-12">
            <div class="container">
                <div class="col-md-6">
                    <?php require $requisicoes->requestModules("logotipo"); ?>
                </div>
                <div class="col-md-6">
                    <div class="usuario">
                        <span class="glyphicon glyphicon-user"></span> Seja bem vindo, <span style="text-transform: capitalize;"><?php echo $logado; ?></span>
                    </div>
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
                <?php
                    if(!isset($_GET["pagina"])) $_GET["pagina"] = null;
                    $requisicoes->requestAdminPage($_GET["pagina"]); 
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
