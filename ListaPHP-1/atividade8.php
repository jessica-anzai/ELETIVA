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
    <label for="altura" class="form-label">Altura</label>
    <input type="number" id="altura" name="altura" class="form-control">
  </div>
  <div class="col-5">
    <label for="largura" class="form-label">Largura</label>
    <input type="number" id="largura" name="largura" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $altura = $_POST['altura'];
    $largura = $_POST['largura'];

    $area = $altura * $largura;
    if($altura === $largura){
        echo "A área do quadrado é $area";
    }
    else{
        echo "A área do retângulo é $area";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>