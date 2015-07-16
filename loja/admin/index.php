<?php
//ini_set("display_errors", "On");
session_start();
unset($_SESSION['login']);
unset($_SESSION['senha']);
$logado = null;
require_once "../includes/Requisicoes.php";
require_once "../conexao/Conexao.php";
$requisicoes = new Requisicoes();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo $requisicoes->requestURL(); ?>favicon.ico" />
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
        <div class="container">
            <h2>Painel de administração</h2>
            <h4>Faça login para acessar o sistema</h4>
            <br />
            <br />
            <br />
            <br />
            <div>
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <img src="images/security.png" alt="Segurança" title="Realize login" />
                </div>
                <div class="col-md-3">
                    <form method="post" action="logAdmin.php" id="formlogin" name="formlogin" > 
                        <fieldset id="fiel">
                            <label>Usuario </label>
                            <input type="text" id="usuario" name="usuario"/> <br> 
                            <label>Senha
                            </label> <input type="password" id="senha" name="senha"/> <br> 
                            <input type="submit" value="Acessar"/> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>