<main>
<section>
    <a href="index.php">
        <button class="btn btn-succes">Voltar</button>
    </a>

</section>
    <h2 class="mt-3"><?=TITLE?></h2>
<form method="post">

    <div class="form-group">
        <label>Nome do Produto</label>
        <input type="text" class="form-control" name="nome_produto" value="<?=$obProduto->nome_produto?>"> <!-- campo de texto comum -->
    </div>

    <div class="form-group">
        <label>Fabricante do Produto</label>
        <textarea class="form-control" name="fabricante_produto" rows="1"><?=$obProduto->fabricante_produto?></textarea>
    </div>  
    <div class="form-group">
        <label>Categoria do Produto</label>
        <textarea class="form-control" name="categoria_produto" rows="1"><?=$obProduto->categoria_produto?></textarea>
    </div>
    <div class="form-group">
        <label>Preço</label>
        <textarea class="form-control" name="preco" rows="1"><?=$obProduto->preco?></textarea>
    </div>

  
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button> <!-- botao de enviar -->
    </div>

</form>
</main>