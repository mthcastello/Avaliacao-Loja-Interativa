<?php
namespace App\Db;
use PDO; // chamar o PDO para uso
use PDOException; // chamar o PDOException
class Database
{ // Criar a classe

    const HOST = 'localhost'; // @var string host de conexao com o banco de dados

    const NAME = 'cadastro_produtos'; // @var string nome do banco de dados

    const USER = 'root'; // @var string usuario do bando de dados

    // const PASS = ''; @var string caso haja senha no db

    private $table; //@var [type] Nome da tabela a ser manipulada.

    private $connection; //@var PDO Instancia de conexão com banco de dados

    public function __construct($table = null)
    { // @param string contrutor caso defina algum valor, já ira definir a classe $table
        $this->table = $table;
        $this->setConnection(); // função para utilizar o PDO

    }

    private function  setConnection(){
        try{

            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e)
        {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query,$params = []) //@param string @param array @return PDOStatement método responsavel por executar querys no banco de dados
    {
        try{
            $statement = $this->connection->prepare($query); //vai receber a instanca de PDOstatement, assim chamando connection e o metodo dentro prepare ( onde passa a $query e ele verifica qual binds ele deve substituir
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e)
        {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){ //@param array @return interger metodo responsavel  por inserir dados no bando

        $fields= array_keys($values); // dados da query
        $binds = array_pad([],count($fields),'?'); // pega array e confere se tem 'n' posiçoes, se essas posições estiverem vazias completa com o padrão escolhido

        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',',$binds).')'; //monta a query


        $this->execute($query,array_values($values)); // executa o INSERT

        return $this->connection->lastInsertId(); // retorna o Id inserido

    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){ // @param string @param string @param string @return PDOStatement - método responsável por executar uma consulta no banco
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$where : '';


        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$order.' '.$limit;//monta a QUERY

        return $this->execute($query);
    }
    public function update($where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    public function delete($where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
        return true;
    }

}

