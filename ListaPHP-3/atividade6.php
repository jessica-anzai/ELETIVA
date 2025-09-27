<?php 
    include("cabecalho.php");
?>
<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <h2 class="text-center">Atividade 5</h2>
        <div class="row justify-content-center">
            <div class="col-5 4mb-3">
                <label for="num" class="form-label">Insira um número</label>
                <input type="number" id="num" name="num" class="form-control" step="0.01">
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
    function Arredondar($num){
        return round($num);
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $num = $_POST['num'];
        $redondo = Arredondar($num);

        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h3>RESPOSTA</h3>";
        echo"<p>Número inserido: $num        Número arredondado: $redondo</p>";
        echo "</div>";
    }
    include("rodape.php");
?>