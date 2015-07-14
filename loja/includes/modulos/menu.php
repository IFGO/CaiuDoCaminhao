<?php
    require_once './conexao/conexao.php';
    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    
    $sql = "SELECT * FROM categorias ORDER BY nome ASC LIMIT 6";
    $categorias = mysqli_query($con->getConexao(), $sql);
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-2"><a href="index.php?pagina=categoria&id=<?php echo $categoria['id'];?>"><?php echo $categoria['nome'];?></a></div>
    <?php } ?>
