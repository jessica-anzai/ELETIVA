<?php

    include('cabecalho.php');

?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="row mt-3">
            <h3 class="text-center"><?= $i ?>º Item</h3>
            <div class="col">
                <label for="nome<?= $i ?>" class="form-label">Nome</label>
                <input name="nome[]" id="nome<?= $i ?>" class="form-control" placeholder="Nome">
            </div>
            <div class="col">
                <label for="preco<?= $i ?>" class="form-label">Preço</label>
                <input name="preco[]" id="preco<?= $i ?>" class="form-control" type="number" step="0.01" min="0" placeholder="Preço">
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
        $nomes = $_POST['nome'];
        $precos = $_POST['preco'];
        $itens = [];

        // Calcula o preço com imposto e monta o mapa
        for ($i = 0; $i < 5; $i++) {
            $nome = trim($nomes[$i]);
            $preco = floatval($precos[$i]);
            if ($nome !== "") {
                $precoComImposto = $preco * 1.15;
                $itens[$nome] = $precoComImposto;
            }
        }

        // Ordena pelo preço com imposto (do menor para o maior)
        asort($itens);

        // Exibe a lista de itens e preços com imposto
        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h4>Itens com Imposto</h4>";
        if (!empty($itens)) {
            foreach ($itens as $nome => $preco) {
                echo "<p><strong>$nome</strong>: R$ " . number_format($preco, 2, ',', '.') . "</p>";
            }
        } else {
            echo "<p>Nenhum item informado.</p>";
        }
        echo '</div>';
    }

    include('rodape.php');

?>