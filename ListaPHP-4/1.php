<?php

    include('cabecalho.php');

?>

<form method='post'>
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class='row mt-3'>
            <h3 class="text-center"><?= $i?>° Contato</h3>
            <div class='col'>
                <label for="nome<?= $i ?>" class="form-label">Nome</label>
                <input name="nome[]" id="nome<?= $i ?>" class="form-control" placeholder="Nome">
            </div>
            <div class="col">
                <label for='contato<?= $i ?>' class="form-label">Contato</label>
                <input name="contato[]" id="contato<?= $i ?>" class="form-control" placeholder="Contato">
            </div>
        </div>
        <?php endfor ?>
        <div class="row mt-3 mb-3">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-success me-md-2" type="submit">Enviar</button>
                    <button class="btn btn-outline-secondary" onclick="location.reload(true);">Atualizar página</button>
                </div>
         </div>
    </div>
</form>


<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nomes = $_POST['nome'];
        $contatos = $_POST['contato'];
        $agenda = [];
        $nomesDuplicados = [];
        $contatosDuplicados = [];

        // Percorre os dados enviados e monta a agenda
        for ($i = 0; $i < 5; $i++) {
            $nome = trim($nomes[$i]);
            $contato = trim($contatos[$i]);

            // Evita adicionar nomes repetidos
            if (array_key_exists($nome, $agenda)) {
                $nomesDuplicados[] = $nome;
                continue;
            }
            // Evita adicionar contatos repetidos
            if (in_array($contato, $agenda)) {
                $contatosDuplicados[] = $contato;
                continue;
            }
            // Adiciona o contato à agenda
            $agenda[$nome] = $contato;
        }

        // Ordena a agenda pelo número do contato
        asort($agenda);

        // Exibe a lista de contatos cadastrados
        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h4>Agenda de Contatos</h4>";
        if (!empty($agenda)) {
            echo "<ul>";
            foreach ($agenda as $nome => $contato) {
                echo "<li><strong>$nome</strong>: $contato</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum contato válido informado.</p>";
        }

        // Mostra avisos caso haja duplicidade
        if (!empty($nomesDuplicados)) {
            echo "<p class='text-danger'>Nomes repetidos não foram adicionados: " . implode(", ", $nomesDuplicados) . "</p>";
        }
        if (!empty($contatosDuplicados)) {
            echo "<p class='text-danger'>Contatos repetidos não foram adicionados: " . implode(", ", $contatosDuplicados) . "</p>";
        }
        echo '</div>';
    }

    include('rodape.php');

?>