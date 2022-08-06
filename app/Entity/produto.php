<?php

namespace App\Entity;

use App\Db\Database;
use PDO;
class Produto{
    // identificador unico do Produto @var integer
    public $id_produtos;

    
    public $nome_produto;

   
    public $fabricante_produto;

  
    public $categoria_produto;

 
    public $preco;

    public function cadastrar(){   //@return boolean Método responsavel por cadastrar uma nova vaga no banco de dados
           

            //inserir a vaga no campos

            $obDatabase = new Database('produtos');
            $this->id_produtos = $obDatabase->insert([
                'nome_produto' => $this->nome_produto,
                'fabricante_produto' => $this->fabricante_produto,
                'categoria_produto'=> $this->categoria_produto,
                'preco'=> $this->preco 
                       ]);



            return true; //retornar sucesso
    }

    public function atualizar(){
        return (new Database('produtos'))->update('id_produtos = '.$this->id_produtos,[
            'nome_produto' => $this->nome_produto,
                'fabricante_produto' => $this->fabricante_produto,
                'categoria_produto'=> $this->categoria_produto,
                'preco'=> $this->preco 
        ]);
    }

    public function excluir(){
        return (new Database('produtos'))->delete('id_produtos = '.$this->id_produtos);
    }


    public static function getProdutos($where = null, $order = null, $limit = null) //@param string @param string @param string @return array método responsável por obter vagas do banco de dados
    {
        return (new Database('produtos'))->select($where,$order,$limit)
                                            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getProduto($id_produtos){ // método responsavel por buscar um produto com base em seu ID
        return (new Database('produtos'))->select('id_produtos = '.$id_produtos)
                                            ->fetchObject(self::class);
    }
}
