<?php
include("cabecalho.php");
?>
<form method="post">

    <div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5">
        <div class="row justify-content-center">
            <div class="col-5 4mb-3">
                <label for="n1" class="form-label">Número 1</label>
                <input type="number" id="n1" name="n1" class="form-control">
            </div>
            <div class="col-5 mb-3">
                <label for="n2" class="form-label">Número 2</label>
                <input type="number" id="n2" name="n2" class="form-control">
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-success me-md-2" type="submit">Enviar</button>
                <button class="btn btn-outline-secondary" type="clear">Cancelar</button>
            </div>
        </div>
    </div>
</form>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];

        $soma = $n1 + $n2;

        if($n1 == $n2){
            $triplo = $soma*3;
            echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
            echo "<h3>RESPOSTA</h3>";
            echo "$n1 e $n2 são iguais";
            echo "<p>então o triplo da soma ($soma) é $triplo</p>";
            echo "</div>";
        }

        else {
            echo '<div class="p-3 container rounded bg-success p-2 text-dark bg-opacity-10 border mt-5 w-75 mb-5 text-center">';
            echo "<h3>RESPOSTA</h3>";
            echo "A soma de $n1 e $n2 é igual a $soma";
            echo "</div>";
        }

    }

include("rodape.php");
?>