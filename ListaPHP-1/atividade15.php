<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1>Atividade 15 - Cálculo de IMC</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="peso" class="form-label">Informe o seu peso</label>
    <input type="number" step="0.01" id="peso" name="peso" class="form-control">
  </div>
  <div class="col-5">
    <label for="altura" class="form-label">Informe a sua altura</label>
    <input type="number" step="0.01" id="altura" name="altura" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura**2);

    if ($imc < 18.5) {
       echo "O IMC é $imc e você está abaixo do peso ideal";
    }
    elseif (18.5 < $imc && $imc < 24.9){
        echo "O IMC é $imc e você está no peso ideal";
    }
    elseif ($imc > 25 && $imc < 29.9){
        echo "O IMC é $imc e você está sobrepeso";
    }
    elseif ($imc > 30){
        echo "O IMC é $imc e você está obeso";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>