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
<h1>Atividade 5 - Média de 3 notas</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="nota1" class="form-label">Informe a primeira nota</label>
    <input type="number" id="nota1" name="nota1" class="form-control">
  </div>
  <div class="col-5">
    <label for="nota2" class="form-label">Informe a segunda nota</label>
    <input type="number" id="nota2" name="nota2" class="form-control">
  </div>
  <div class="col-5">
    <label for="nota3" class="form-label">Informe a terceira nota</label>
    <input type="number" id="nota3" name="nota3" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $n1 = $_POST['nota1'];
    $n2 = $_POST['nota2'];
    $n3 = $_POST['nota3'];

    $media = ($n1 + $n2 + $n3)/3;
    $mediaFormat = number_format($media, 2, ",", ".");

    echo "A média das 3 notas inseridas é $mediaFormat";
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>