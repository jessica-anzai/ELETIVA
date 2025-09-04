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
<h1>Atividade 8 - Área de Retângulo</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
        <label for="altura1" class="form-label">Altura 1</label>
        <input type="number" id="altura1" name="altura1" class="form-control">
  </div>
    <div class="col-5">
        <label for="altura2" class="form-label">Altura 2</label>
        <input type="number" id="altura2" name="altura2" class="form-control">
    </div>
  <div class="col-5">
    <label for="largura1" class="form-label">Largura 1</label>
    <input type="number" id="largura1" name="largura1" class="form-control">
  </div>
  <div class="col-5">
    <label for="largura2" class="form-label">Largura 2</label>
    <input type="number" id="largura2" name="largura2" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $altura1 = $_POST['altura1'];
    $altura2 = $_POST['altura2'];
    $largura1 = $_POST['largura1'];
    $largura2 = $_POST['largura2'];

    $perimetro = $altura1 + $altura2 + $largura1 + $largura2;

    echo "O perímetro do retângulo é $perimetro";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>