<?php


require __DIR__.'/vendor/autoload.php';

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
if(isset($_POST['excluir'])) {


    $obProduto->excluir();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';