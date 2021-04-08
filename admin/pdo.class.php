<?php
	class Database
	{
	    protected static $db;
	    private function __construct(){
	        $db_host 	= "localhost";  // local fisico da aplicacao
	        $db_nome 	= "pmap_correg";  // nome do banco de dados
	        $db_usuario = "root"; // usuario do banco de dados
	        $db_senha 	= "password";  // senha do banco de dados
	        $db_driver 	= "mysql"; // representa do SGDB (mysql, sql, postgr, oracle)
	        try{
	            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
	            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            self::$db->exec('SET NAMES utf8');
	        }catch (PDOException $e){
	            die("Connection Error: " . $e->getMessage());
	        }
	    }
	    public static function conexao(){
	        if (!self::$db){
	            new Database();
	        }
	        return self::$db;
	    }
	}

        function Novo($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO denuncia (usf_cpf,usf_senha,usf_nome,usf_sobrenome)
                                VALUES(:CPF, :SENHA, :NOME, :SOBRENOME)");
        $obj->bindParam(":CPF", $dados['cpf'] , PDO::PARAM_STR);
        $obj->bindParam(":SENHA", $dados['senha'] , PDO::PARAM_STR);
        $obj->bindParam(":NOME", $dados['nome'] , PDO::PARAM_STR);
        $obj->bindParam(":SOBRENOME", $dados['sobrenome'] , PDO::PARAM_STR);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

	function Cadastrar($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO denuncia (dsc,qtd,valor,habilita)
        						VALUES(:DESCRICAO, :QUANTIDADE, :VALOR, :HABILITA)");
        $obj->bindParam(":DESCRICAO", $dados['dsc'] , PDO::PARAM_STR);
        $obj->bindParam(":QUANTIDADE", $dados['qtd'] , PDO::PARAM_INT);
        $obj->bindParam(":VALOR", $dados['valor'] , PDO::PARAM_INT);
        $obj->bindParam(":HABILITA", $dados['habilita'] , PDO::PARAM_STR);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [	$r_obj, $total];
#        return $volta;
        return $total;
    }

    function Mostrar() {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM us_fisico");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function Deletar($id){
    	$pdo = Database::conexao();
    	$d   = $pdo->prepare("DELETE FROM produtos WHERE id = :ID");
        $d->bindParam(":ID", $id , PDO::PARAM_INT);
        $d->execute();
        $total = $d->rowCount(); /* para insert, upadate ou delete */
        return $total;

    }

    function Atualizar($id,$dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("UPDATE denuncia SET dsc = :DESCRICAO, qtd = :QUANTIDADE, valor = :VALOR, habilita = :HABILITA WHERE id = :ID");
        $obj->bindParam(":DESCRICAO", $dados['dsc'] , PDO::PARAM_STR);
        $obj->bindParam(":QUANTIDADE", $dados['qtd'] , PDO::PARAM_INT);
        $obj->bindParam(":VALOR", $dados['valor'] , PDO::PARAM_INT);
        $obj->bindParam(":HABILITA", $dados['habilita'] , PDO::PARAM_STR);
        $obj->bindParam(":ID", $dados['id'] , PDO::PARAM_INT);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount();
        }

    function MostrarEdicao($cpf) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM us_fisico WHERE usf_cpf = $cpf");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }
