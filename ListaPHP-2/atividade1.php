<?php 
    include("cabecalho.php");
?>
  <form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <h2 class="text-center"">Atividade 1</h2>
        <div class="row mt-3">
            <div class="col-3">
                <label for="n1" class="form-label">Digite o primeiro número</label>
                <input type="number" name="n1" id="n1" class="form-control">
            </div>

            <div class="col-3">
                <label for="n2" class="form-label">Digite o segundo número</label>
                <input type="number" name="n2" id="n2" class="form-control">
            </div>

            <div class="col-3">
                <label for="n3" class="form-label">Digite o terceiro número</label>
                <input type="number" name="n3" id="n3" class="form-control">
            </div>

            <div class="col-3">
                <label for="n4" class="form-label">Digite o quarto número</label>
                <input type="number" name="n4" id="n4" class="form-control">
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-3">
                <label for="n5" class="form-label">Digite o quinto número</label>
                <input type="number" name="n5" id="n5" class="form-control">
            </div>

            <div class="col-3">
                <label for="n6" class="form-label">Digite o sexto número</label>
                <input type="number" name="n6" id="n6" class="form-control">
            </div>

            <div class="col-3">
                <label for="n7" class="form-label">Digite o sétimo número</label>
                <input type="number" name="n7" id="n7" class="form-control">
            </div>
        </div>

            <div class="row mt-3 mb-3">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2" type="submit">Enviar</button>
                    <button class="btn btn-outline-secondary" onclick="location.reload(true);">Atualizar página</button>
                </div>
            </div>
        </div>
    </div>
</form>  

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];
    $n5 = $_POST['n5'];
    $n6 = $_POST['n6'];
    $n7 = $_POST['n7'];
    
    $menor = $n1;
    $posicao = 1;
    
    if($n2 < $menor){
        $menor = $n2;
        $posicao = 2;
    }
    if($n3 < $menor){
        $menor = $n3;
        $posicao = 3;
    }
    if($n4 < $menor){
        $menor = $n4;
        $posicao = 4;
    }
    if($n5 < $menor){
        $menor = $n5;
        $posicao = 5;
    }
    if($n6 < $menor){
        $menor = $n6;
        $posicao = 6;
    }
    if($n7 < $menor){
        $menor = $n7;
        $posicao = 7;
    }
    
    echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
    echo "<h3>RESPOSTA</h3>";
    echo "<label class='form-label fs-3'>Menor número: $menor - Posição: $posicao</label>";
    echo '</div>';
    
  }
    include("rodape.php");
?>