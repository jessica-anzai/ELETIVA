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
<h1>Atividade 17 - Cálculo de Juros Simples</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="capital" class="form-label">Informe o capital</label>
    <input type="number" step="0.01" id="capital" name="capital" class="form-control">
  </div>
  <div class="col-5">
    <label for="juros" class="form-label">Informe o juros</label>
    <input type="number" step="0.01" id="juros" name="juros" class="form-control">
  </div>
  <div class="col-5">
    <label for="periodo" class="form-label">Informe o período</label>
    <input type="number" step="0.01" id="periodo" name="periodo" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $capital = $_POST['capital'];
    $juros = $_POST['juros'];
    $periodo = $_POST['periodo'];


    $valor = $capital * ($juros/100) * $periodo;

    echo "O juros a pagar será de R$$valor";
    
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>