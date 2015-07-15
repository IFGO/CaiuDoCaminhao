<?php 
    require_once "../conexao/conexao.php";
    session_start();
    
    $login = $_REQUEST['usuario']; 
    $senha = $_REQUEST['senha'];
    
    $sql = ("SELECT nomeUsuario FROM usuarios WHERE nomeUsuario = '".$login."' AND senha = '".sha1($senha)."'");
    $resultado = mysqli_query(Conexao::getInstance(), $sql);
          
    if(mysqli_num_rows ($resultado) > 0 ) { 
        $_SESSION['login'] = $login; 
        $_SESSION['senha'] = $senha; 
        header('location:site.php');         
    }
    else{
        unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
        header('location:index.php');
    }
?>
