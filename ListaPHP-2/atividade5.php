<?php 
    include("cabecalho.php");
?>

<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <h2 class="text-center">Atividade 5</h2>
        <div class="row justify-content-center">
            <div class="col-5 4mb-3">
                <label for="mes" class="form-label">Insira um valor (1 a 12)</label>
                <input type="number" id="mes" name="mes" class="form-control">
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

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $mes = $_POST['mes'];

        echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
        echo "<h3>RESPOSTA</h3>";
        switch($mes){
            case 1: echo "1 - Janeiro";
                    break;
            case 2: echo "2 - Fevereiro";
                    break;
            case 3: echo "3 - Março";
                    break;
            case 4: echo "4 - Abril";
                    break;
            case 5: echo "5 - Maio";
                    break;
            case 6: echo "6 - Junho";
                    break;
            case 7: echo "7 - Julho";
                    break;
            case 8: echo "8 - Agosto";
                    break;
            case 9: echo "9 - Setembro";
                    break;
            case 10: echo "10 - Outubro";
                    break;
            case 11: echo "11 - Novembro";
                    break;
            case 12: echo "12 - Dezembro";
                    break;
        }
        echo"</div>";
    }

    include("rodape.php");
?>