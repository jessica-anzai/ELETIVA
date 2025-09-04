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
<h1>Atividade 16 - Cálculo de Desconto</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="preco" class="form-label">Informe o preço</label>
    <input type="number" step="0.01" id="preco" name="preco" class="form-control">
  </div>
  <div class="col-5">
    <label for="percent" class="form-label">Informe o percentual de desconto</label>
    <input type="number" step="0.01" id="percent" name="percent" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $preco = $_POST['preco'];
    $percent = $_POST['percent'];

    $desconto = $preco * ($percent/100);

    $valorFinal = $preco - $desconto;

    echo "O desconto será de R$$desconto e o preço final será de R$$valorFinal";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>