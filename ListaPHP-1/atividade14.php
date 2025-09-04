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
<h1>Atividade 14 - Quilômetros para Milhas</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="quilometro" class="form-label">Quilômetro</label>
    <input type="number" id="quilometro" name="quilometro" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $km = $_POST['quilometro'];

    $mi = $km * 0.621371;

    echo "$km quilômetro(s) é igual a $mi milha(s)";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>