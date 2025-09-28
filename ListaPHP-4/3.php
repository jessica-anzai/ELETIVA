<?php

    include('cabecalho.php');

?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="row mt-3">
            <h3 class="text-center"><?= $i ?>º Produto</h3>
            <div class="col">
                <label for="codigo<?= $i ?>" class="form-label">Código</label>
                <input name="codigo[]" id="codigo<?= $i ?>" class="form-control" placeholder="Código">
            </div>
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
        $codigos = $_POST['codigo'];
        $nomes = $_POST['nome'];
        $precos = $_POST['preco'];
        $produtos = [];

        // Monta o mapa de produtos
        for ($i = 0; $i < 5; $i++) {
            $codigo = trim($codigos[$i]);
            $nome = trim($nomes[$i]);
            $preco = floatval($precos[$i]);

            if ($codigo !== "" && $nome !== "") {
                // Aplica desconto de 10% se preço > 100
                if ($preco > 100) {
                    $preco = $preco * 0.9;
                }
                $produtos[$codigo] = [
                    'nome' => $nome,
                    'preco' => $preco
                ];
            }
        }

        // Ordena pelo nome do produto
        uasort($produtos, function($a, $b) {
            return strcmp($a['nome'], $b['nome']);
        });

        // Exibe a lista de produtos
        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h4>Lista de Produtos</h4>";
        if (!empty($produtos)) {
            foreach ($produtos as $codigo => $info) {
                echo "<p><strong>Código:</strong> $codigo | <strong>Nome:</strong> {$info['nome']} | <strong>Preço:</strong> R$ " . number_format($info['preco'], 2, ',', '.') . "</p>";
            }
        } else {
            echo "<p>Nenhum produto informado.</p>";
        }
        echo '</div>';
    }

    include('rodape.php');

?>