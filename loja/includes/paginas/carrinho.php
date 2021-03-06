<?php
    session_start();

    if(!isset($_SESSION['carrinho'])){
       $_SESSION['carrinho'] = array();
    }

    //adiciona produto

    if(isset($_GET['acao'])){

        //ADICIONAR CARRINHO
        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
        }

        //REMOVER CARRINHO
        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
        }

        //ALTERAR QUANTIDADE
        if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
                foreach($_POST['prod'] as $id => $qtd){
                    $id  = intval($id);
                    $qtd = intval($qtd);
                    if(!empty($qtd) || $qtd <> 0){
                       $_SESSION['carrinho'][$id] = $qtd;
                    }else{
                       unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }

    }
?>

<div class="col-md-12">
    
    <table class="table table-striped">
        <h1 style="font-size:32px;">Carrinho de Compras</h1>
        <p>Confira os produtos que você escolheu</p>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>SubTotal</th>
                <th>Remover</th>
            </tr>
        </thead>
        <form action="index.php?pagina=carrinho&acao=up" method="post">


        <tbody>
            <?php
                if(count($_SESSION['carrinho']) == 0){
                    echo '<tr><td colspan="5">Não existem produtos no seu carrinho</td></tr>';
                }else{
                    $total = 0;
                    foreach($_SESSION['carrinho'] as $id => $qtd){
                        $qr    = Conexao::getQuery(Sql::getSqlProduto($id)) or die(mysql_error());
                        $ln    = mysqli_fetch_assoc($qr);

                        $nome  = $ln['nome'];
                        $valor = number_format($ln['valor'], 2, ',', '.');
                        $sub   = number_format($ln['valor'] * $qtd, 2, ',', '.');

                        $total += $ln['valor'] * $qtd;

                        echo '<tr>       
                            <td>'.$nome.'</td>
                            <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                            <td>R$ '.$valor.'</td>
                            <td>R$ '.$sub.'</td>
                            <td><button><a href="index.php?pagina=carrinho&acao=del&id='.$id.'"><span class="glyphicon glyphicon-trash"></span>Remover</a></button></br></td>
                            </tr>';
                    }
                    $total = number_format($total, 2, ',', '.');
                    echo '<tr>
                                <td colspan="4">Total</td>
                                <td>R$ '.$total.'</td>
                          </tr>';
                }
            ?>

         </tbody>
                 <tfoot>
            <tr>
                <td colspan="5" style="text-align:center;"><input type="submit" value="Atualizar Carrinho" /></td>
                <tr/>
        </tfoot>
        </form>
    </table>
</div>