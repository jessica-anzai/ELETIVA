<?php

    include('cabecalho.php');

?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="row mt-3">
            <h3 class="text-center"><?= $i ?>º Livro</h3>
            <div class="col">
                <label for="titulo<?= $i ?>" class="form-label">Título</label>
                <input name="titulo[]" id="titulo<?= $i ?>" class="form-control" placeholder="Título">
            </div>
            <div class="col">
                <label for="estoque<?= $i ?>" class="form-label">Quantidade em Estoque</label>
                <input name="estoque[]" id="estoque<?= $i ?>" class="form-control" type="number" min="0" placeholder="Quantidade">
            </div>
        </div>
        <?php endfor; ?>
        <div class="row mt-3 mb-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-success me-md-2" type="submit">Enviar</button>
                <button class="btn btn-outline-secondary" onclick="location.reload(true);">Atualizar página</button>
            </div>
        </div>
    </div>
</form>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulos = $_POST['titulo'];
        $estoques = $_POST['estoque'];
        $livros = [];

        // Monta o mapa de livros
        for ($i = 0; $i < 5; $i++) {
            $titulo = trim($titulos[$i]);
            $estoque = intval($estoques[$i]);
            if ($titulo !== "") {
                $livros[$titulo] = $estoque;
            }
        }

        // Ordena pelo título do livro
        ksort($livros);

        // Exibe a lista de livros e alerta para baixa quantidade
        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h4>Estoque de Livros</h4>";
        if (!empty($livros)) {
            foreach ($livros as $titulo => $estoque) {
                if ($estoque < 5) {
                    echo "<p><strong>$titulo</strong>: $estoque <span class='text-danger'>(Baixa quantidade!)</span></p>";
                } else {
                    echo "<p><strong>$titulo</strong>: $estoque</p>";
                }
            }
        } else {
            echo "<p>Nenhum livro informado.</p>";
        }
        echo '</div>';
    }

    include('rodape.php');

?>