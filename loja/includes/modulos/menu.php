<div class="col-md-2 <?php if(!isset($_GET['pagina'])) echo 'active'; ?>">
    <a href="index.php">Home</a>
</div>
<?php
    
    function verificarAtivo($idMenu) {
        if(isset($_GET['pagina'])) {
            if($_GET['pagina'] === "categoria") {
                if($idMenu == $_GET['id']) {
                    return "active";
                }
            } 
        }
    }
    
    $sql = "SELECT * FROM menu WHERE tipo = 2 ORDER BY nome ASC LIMIT 5";
    $categorias = mysqli_query(Conexao::getInstance(), $sql);
    
    while($categoria = $categorias->fetch_array()) { ?>
        <div class="col-md-2 <?php echo verificarAtivo($categoria['link']); ?>">
            <a href="index.php?pagina=categoria&id=<?php echo $categoria['link'];?>"><?php echo $categoria['nome'];?></a>
        </div>
    <?php }
