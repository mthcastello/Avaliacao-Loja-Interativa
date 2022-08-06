<?php

namespace App\Entity;

use App\Db\Database;
use PDO;
class Fabricante{
    
    public $id_fabricante;


    public $nome_fabricante;

 
    public $categoria1;

  
    public $categoria2;


    public $categoria3;

    public function cadastrarFabricante(){   //@return boolean Método responsavel por cadastrar uma nova Fabricante no banco de dados
           

            //inserir a Fabricante no campo

            $obDatabase = new Database('fabricantes');
            $this->id_fabricantes = $obDatabase->insert([
                'nome_fabricante' => $this->nome_fabricante,
                'categoria1' => $this->categoria1,
                'categoria2'=> $this->categoria2,
                'categoria3'=> $this->categoria3 
                       ]);



            return true; //retornar sucesso
    }

    public function atualizar(){
        return (new Database('fabricantes'))->update('id_fabricantes = '.$this->id_fabricantes,[
            'nome_fabricante' => $this->nome_fabricante,
            'categoria1' => $this->categoria1,
            'categoria2'=> $this->categoria2,
            'categoria3'=> $this->categoria3 
        ]);
    }

    public function excluir(){
        return (new Database('fabricantes'))->delete('id_fabricantes = '.$this->id_fabricantes);
    }


    public static function getFabricantes($where = null, $order = null, $limit = null) //@param string @param string @param string @return array método responsável por obter vagas do banco de dados
    {
        return (new Database('fabricantes'))->select($where,$order,$limit)
                                            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getFabricante($id_fabricantes){ // método responsavel por buscar uma Fabricante com base em seu ID
        return (new Database('fabricantes'))->select('id_fabricantes = '.$id_fabricantes)
                                            ->fetchObject(self::class);
    }
}
