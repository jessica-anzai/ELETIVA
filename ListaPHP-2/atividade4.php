<?php
include("cabecalho.php");
?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <h2 class="text-center">Atividade 4</h2>
        <div class="row justify-content-center">
            <div class="col-5 4mb-3">
                <label for="preco" class="form-label">Informe o preço</label>
                <input type="number" id="preco" name="preco" class="form-control">
            </div>
            <div class="row mt-3 mb-3">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-success me-md-2" type="submit">Enviar</button>
                    <button class="btn btn-outline-secondary" onclick="location.reload(true);">Atualizar página</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $preco = $_POST['preco'];
    $aumento = 0;
    $nvPreco = 0;

    if($preco > 100){
        $aumento = $preco * 0.15;
        $nvPreco = $preco + $aumento;
        
        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h3>RESPOSTA</h3>";
        echo "<p>Valor do aumento: $aumento (15%)</p>";
        echo "<p>Valor final: R$$nvPreco</p>";
        echo "</div>";
    }
    else{
        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h3>RESPOSTA</h3>";
        echo "<p>Valor inserido é menor que R$100,00</p>";
        echo "<p>Valor permanece o mesmo</p>";
        echo "</div>";
    }
}
include("rodape.php");
?>