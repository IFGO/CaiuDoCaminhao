<?php
//$cat = $_POST['categoriaHidden'];
$pasta = "../../fotos/"; //. $cat . "/";

    $destino = $pasta . $_FILES['imagem']['name'];
    $arquivo_tmp = $_FILES['imagem']['tmp_name'];
    move_uploaded_file( $arquivo_tmp, $destino);
?>
