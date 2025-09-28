<?php

    include('cabecalho.php');

?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="row mt-3">
            <h3 class="text-center"><?= $i ?>º Aluno</h3>
            <div class="col">
                <label for="nome<?= $i ?>" class="form-label">Nome</label>
                <input name="nome[]" id="nome<?= $i ?>" class="form-control" placeholder="Nome">
            </div>
            <div class="col">
                <label for="nota1_<?= $i ?>" class="form-label">Nota 1</label>
                <input name="nota1[]" id="nota1_<?= $i ?>" class="form-control" type="number" step="0.01" min="0" max="10" placeholder="Nota 1">
            </div>
            <div class="col">
                <label for="nota2_<?= $i ?>" class="form-label">Nota 2</label>
                <input name="nota2[]" id="nota2_<?= $i ?>" class="form-control" type="number" step="0.01" min="0" max="10" placeholder="Nota 2">
            </div>
            <div class="col">
                <label for="nota3_<?= $i ?>" class="form-label">Nota 3</label>
                <input name="nota3[]" id="nota3_<?= $i ?>" class="form-control" type="number" step="0.01" min="0" max="10" placeholder="Nota 3">
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
        $notas1 = $_POST['nota1'];
        $notas2 = $_POST['nota2'];
        $notas3 = $_POST['nota3'];
        $medias = [];

        // Calcula a média de cada aluno e armazena no array associativo
        for ($i = 0; $i < 5; $i++) {
            $nome = trim($nomes[$i]);
            $n1 = floatval($notas1[$i]);
            $n2 = floatval($notas2[$i]);
            $n3 = floatval($notas3[$i]);
            if ($nome !== "") {
                $media = ($n1 + $n2 + $n3) / 3;
                $medias[$nome] = $media;
            }
        }

        // Ordena pela média (do maior para o menor)
        arsort($medias);

        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h4>Médias dos Alunos</h4>";
        if (!empty($medias)) {
            foreach ($medias as $nome => $media) {
                echo "<p><strong>$nome</strong>: " . number_format($media, 2, ',', '.') . "</p>";
            }
        } else {
            echo "<p>Nenhum aluno informado.</p>";
        }
        echo '</div>';
    }

    include('rodape.php');

?>