<?php


require __DIR__.'/vendor/autoload.php';
define('TITLE','Editar Produto');
use App\Entity\Produto;

if(!isset($_GET['id_produtos']) or !is_numeric($_GET['id_produtos'])){
    header('location: index.php?status=error');
    exit;

}

$obProduto = Produto::getProduto($_GET['id_produtos']);

if(!$obProduto instanceof Produto){ //validação da vaga
    header('location: index.php?status=error');
    exit;
}

//validação do post
if(isset($_POST['nome_produto'],$_POST['categoria_produto'],$_POST['fabricante_produto'],$_POST['preco'])) {


    $obProduto->nome_produto = $_POST['nome_produto'];
    $obProduto->categoria_produto = $_POST['categoria_produto'];
    $obProduto->fabricante_produto = $_POST['fabricante_produto'];
    $obProduto->preco = $_POST['preco'];
    $obProduto->atualizar();

    header('location: index.php?status=success');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';