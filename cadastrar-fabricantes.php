
<?php


require __DIR__.'/vendor/autoload.php';

use App\Entity\Fabricante;

define('TITLE','Cadastrar Fabricante');
$obFabricante = new Fabricante;
//validação do post
if(isset($_POST['nome_fabricante'],$_POST['categoria1'])) {


    $obFabricante->nome_fabricante = $_POST['nome_fabricante'];
    $obFabricante->categoria1 = $_POST['categoria1'];
    $obFabricante->categoria2 = $_POST['categoria2'];
    $obFabricante->categoria3 = $_POST['categoria3'];
    $obFabricante->cadastrarFabricante();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario-fabricantes.php';
include __DIR__.'/includes/footer.php';