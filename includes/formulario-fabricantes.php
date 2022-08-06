

<main>
<section>
    <a href="index.php">
        <button class="btn btn-succes">Voltar</button>
    </a>

</section>
    <h2 class="mt-3"><?=TITLE?></h2>
<form method="post">

    <div class="form-group">
        <label>Nome do Fabricante</label>
        <input type="text" class="form-control" name="nome_fabricante" value=""> <!-- campo de texto comum -->
    </div>

    <div class="form-group">
        <label>Categoria 1</label>
        <textarea class="form-control" name="categoria1" rows="1"></textarea>
    </div>
    <div class="form-group">
        <label>Categoria 2</label>
        <textarea class="form-control" name="categoria2" rows="1"></textarea>
    </div>
    <div class="form-group">
        <label>Categoria 3</label>
        <textarea class="form-control" name="categoria3" rows="1"></textarea>
    </div>

  
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button> <!-- botao de enviar -->
    </div>

</form>
</main>