<?php

    include('cabecalho.php');

?>

<form method='post'>
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class='row mt-3'>
            <h3 class="text-center"><?= $i?>° Contato</h3>
            <div class='col'>
                <label for="nome[]" class="form-label">Nome</label>
                <input name="nome[]" id="nome[]" class="form-control" placeholder="Nome">
            </div>
            <div class="col">
                <label for='contato[]' class="form-label">Contato</label>
                <input name="contato[]" id="contato[]" class="form-control" placeholder="Contato">
            </div>
        </div>
        <?php endfor ?>
        <button class="btn btn-success mt-3" type="submit">Enviar</button>
    </div>
</form>


<?php
    /*
    Crie um formulário que leia dados de 5 contatos: nome e número de telefone. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos contatos e os valores são os números de telefone. Verifique se há duplicatas de nome ou número de telefone antes de adicionar um novo contato. Exiba a lista ordenada pelos nomes dos contatos.
    */
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nomes = $_POST['nome'];
        $contatos = $_POST['contato'];

        $agenda =[];

        for ($i = 0; $i < count($nomes); $i++) {
            $nome = trim($nomes[$i]);
            $numero = trim($contatos[$i]);

            $agenda[$nome] = $numero;
        
        }

        ksort($agenda, SORT_STRING | SORT_FLAG_CASE);

        echo "<h3>Lista de Contatos:</h3>";
        echo "<ul>";
        foreach ($agenda as $a) {
            echo "<li><strong>$nome</strong>: $numero</li>";
        }
        echo "</ul>";
        
    }

    include('rodape.php');

?>