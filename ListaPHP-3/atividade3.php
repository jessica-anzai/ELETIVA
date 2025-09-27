<?php 
    include("cabecalho.php");
?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <h2 class="text-center">Atividade 3</h2>
        <div class="row justify-content-center">
            <div class="col-5 4mb-3">
                <label for="texto" class="form-label">Insira uma palavra</label>
                <input type="text" id="texto" name="texto" class="form-control">
            </div>
            <div class="col-5 4mb-3">
                <label for="texto2" class="form-label">Insira outra palavra</label>
                <input type="text" id="texto2" name="texto2" class="form-control">
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
    function ContidoEm($texto1,$texto2){
        if(str_contains($texto1,$texto2)){
            echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
            echo "<h3>RESPOSTA</h3>";
            echo"<p>$texto2 está em $texto1</p>";
            echo "</div>";
        }
        else{
            echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
            echo "<h3>RESPOSTA</h3>";
            echo"<p>$texto2 não está em $texto1</p>";
            echo "</div>";
        }
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $texto = $_POST['texto'];
        $texto2 = $_POST['texto2'];
        ContidoEm($texto,$texto2);

    }

    include("rodape.php");
?>