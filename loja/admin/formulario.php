<?php
    require_once '../conexao/conexao.php';
    require_once '../conexao/crudGeral.php';

    $con = new Conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    @$getId = $_GET['id'];  //pega id para ediçao caso exista
    if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
        $consulta = mysqli_query($con->getConexao(),"SELECT * FROM categorias WHERE id = + $getId");
        $campo = mysqli_fetch_array($consulta);
    }
    
    if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $descricao = $_POST['descricao']; //pega o elemento com o pelo NAME 
        $crud = new crud('categorias');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir($con->getConexao(),"nome,descricao", "'$nome','$descricao'"); // utiliza a funçao INSERIR da classe crud
        header("Location: index.php"); // redireciona para a listagem
    }

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
        $nome = $_POST['nome']; //pega o elemento com o pelo NAME
        $descricao = $_POST['descricao']; //pega o elemento com o pelo NAME
        $crud = new crud('categorias'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->atualizar($con->getConexao(),"nome='$nome',descricao='$descricao'", "id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
//        header("Location: index.php"); // redireciona para a listagem
    }

?>
<!DOCTYPE html>

<form action="" method="post" class="formulario" style="display: none;"><!--   formulario carrega a si mesmo com o action vazio  -->
            
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo @$campo['nome']; // trazendo campo preenchido caso esteja no modo de ediçao ?>" />
            <br />
            <br />
            <label>Descri&ccedil;&atilde;o:</label>
            <input type="text" name="descricao" value="<?php echo @$campo['descricao']; // trazendo campo preenchido caso esteja no modo de ediçao ?>" />
            <br />
            <br />
            <?php
                if(@!$campo['id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
            ?>
                <input type="submit" name="cadastrar" value="Cadastrar" />
            <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
                <input type="submit" name="editar" value="Editar" />    
            <?php } ?>
        </form>

<?php $con->disconnect(); // fecha conexao com o banco ?>