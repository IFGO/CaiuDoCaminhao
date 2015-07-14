<?php

class crud {

    private $sql_ins = "";
    private $tabela = "";
    private $sql_sel = "";

    // construtor, nome da tabela como parametro
    public function __construct($tabela) {
        $this->tabela = $tabela;
        return $this->tabela;
    }

    // funçao de inserçao, campos e seus respectivos valores como parametros		
    public function inserir($getConexao, $campos, $valores) {
        $con = new Conexao();
        $this->sql_ins = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($valores)";
        if (!$this->ins = mysqli_query($con->getConexao(), $this->sql_ins)) {
            die("<center>Erro na inclusão " . '<br>Linha: ' . __LINE__ . "<br>" . mysqli_error() . "<br>
				<a href='index.php'>Voltar ao Menu</a></center>");
        } else {
            print "<script>location='index.php';</script>";
        }
        $con->disconnect();
    }

    // funçao de ediçao, campos com seus respectivos valores e o campo id que define a linha a ser editada como parametros
    public function atualizar($getConexao,$camposvalores, $where = NULL) {
//        $con = new conexao();
        if ($where) {
            $this->sql_upd = "UPDATE  " . $this->tabela . " SET $camposvalores WHERE $where";
        } else {
            $this->sql_upd = "UPDATE  " . $this->tabela . " SET $camposvalores";
        }

        if (!$this->upd = mysqli_query($getConexao, $this->sql_upd)) {
            die("<center>Erro na atualização " . "<br>Linha: " . __LINE__ . "<br>" . mysqli_error() . "<br>
				<a href='index.php'>Voltar ao Menu</a></center>");
        } else {
            print "<center>Registro Atualizado com Sucesso!<br><a href='index.php'>Voltar ao Menu</a></center>";
        }
//        $con->disconnect();
    }

    // funçao de exclusao, campo que define a linha a ser editada como parametro		
    public function excluir($getConexao,$where = NULL) { 
        if ($where) {
            $this->sql_sel = "SELECT * FROM " . $this->tabela . " WHERE $where";
            $this->sql_del = "DELETE FROM " . $this->tabela . " WHERE $where";
        } else {
            $this->sql_sel = "SELECT * FROM " . $this->tabela;
            $this->sql_del = "DELETE FROM " . $this->tabela;
        }
        $sel = mysqli_query($getConexao, $this->sql_sel);
        $regs = mysqli_num_rows($sel);
        
        if ($regs > 0) {
            if (!$this->del = mysqli_query($getConexao, $this->sql_del)) {
                die("<center>Erro na exclusão " . '<br>Linha: ' . __LINE__ . "<br>" . mysqli_error() . "<br>
				<a href='index.php'>Voltar ao Menu</a></center>");
            } else {
                print "<center>Registro Excluído com Sucesso!<br><a href='index.php'>Voltar ao Menu</a></center>";
            }
        } else {
            print "<center>Registro Não encontrado!<br><a href='index.php'>Voltar ao Menu</a></center>";
        }
    }

}

?>