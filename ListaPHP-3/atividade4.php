<?php 
    include("cabecalho.php");
?>
<form method="post">
    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <h2 class="text-center">Atividade 4</h2>
        <div class="row justify-content-center">
            <div class="col-5 4mb-3">
                <label for="dia" class="form-label">Insira um dia</label>
                <input type="text" id="dia" name="dia" class="form-control">
            </div>
            <div class="col-5 4mb-3">
                <label for="mes" class="form-label">Insira um mês</label>
                <input type="text" id="mes" name="mes" class="form-control">
            </div>
            <div class="col-5 4mb-3">
                <label for="ano" class="form-label">Insira um ano</label>
                <input type="text" id="ano" name="ano" class="form-control">
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

    function Verificar($dia,$mes,$ano){
        if(checkdate($mes, $dia, $ano)){
            echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
            echo "<h3>RESPOSTA</h3>";
            echo"<p>A data $dia/$mes/$ano é uma data válida</p>";
            echo "</div>";
        } else {
            echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
            echo "<h3>RESPOSTA</h3>";
            echo"<p>A data $dia/$mes/$ano não é uma data válida</p>";
            echo "</div>";
        }
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        Verificar($dia,$mes,$ano);
    }
    include("rodape.php");
?>