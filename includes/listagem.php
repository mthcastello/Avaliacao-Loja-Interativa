<?php

$mensagem ='';
if(isset($_GET['status'])){
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;

    }
}

$resultados = '';
foreach($produtos as $produto){
    $resultados .= '<tr>
                      <td>'.$produto->id_produtos.'</td>
                      <td>'.$produto->nome_produto.'</td>
                      <td>'.$produto->fabricante_produto.'</td>
                      <td>'.$produto->categoria_produto.'</td>
                      <td>'.$produto->preco.'</td>
                      <td>
                        <a href="editar.php?id_produtos='.$produto->id_produtos.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id_produtos='.$produto->id_produtos.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
}
$resultados = strlen($resultados) ? $resultados :'<tr>
                                                     <td colspan="6" class="text-center">
                                                                Nenhuma Produto cadastrado
                                                                </td>
                                                                </tr>';
?>


<main>
    <?=$mensagem?>
    <section>

        <a href="cadastrar.php"> <!-- criar link para novo arquivo php -->
        <button class="btn btn-success">Novo Produto</button> <!-- botão do link -->
        </a>

    </section>

    <section>

<a href="cadastrar-fabricantes.php"> <!-- criar link para novo arquivo php -->
<button class="btn btn-success">Novo Fabricante</button> <!-- botão do link -->
</a>

</section>

    <section>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Fabricante</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>

    </table>
    </section>
</main>
