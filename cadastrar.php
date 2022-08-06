
<?php


require __DIR__.'/vendor/autoload.php';

use App\Entity\Produto;

define('TITLE','Cadastrar Produto');
$obProduto = new Produto;
//validação do post
if(isset($_POST['nome_produto'],$_POST['categoria_produto'],$_POST['fabricante_produto'],$_POST['preco'])) {


    $obProduto->nome_produto = $_POST['nome_produto'];
    $obProduto->categoria_produto = $_POST['categoria_produto'];
    $obProduto->fabricante_produto = $_POST['fabricante_produto'];
    $obProduto->preco = $_POST['preco'];
    $obProduto->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';