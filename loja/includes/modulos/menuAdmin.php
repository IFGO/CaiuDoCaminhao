<?php
    require_once './conexao/conexao.php';
    
    $con = new conexao(); 
    $con->connect();
    
    $sql = "SELECT * FROM menu ORDER BY nome ASC LIMIT 6";
    $categorias = mysqli_query($con->getConexao(), $sql);
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-4" style="text-align: center;"><a href="index.php?pagina=<?php echo $categoria['alias'];?>"><?php echo $categoria['nome'];?></a></div>
    <?php } ?>
