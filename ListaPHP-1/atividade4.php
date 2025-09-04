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
<h1>Atividade 4 - Divisão de dois números</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="n1" class="form-label">Informe um número</label>
    <input type="number" id="n1" name="n1" class="form-control">
  </div>
  <div class="col-5">
    <label for="n2" class="form-label">Informe outro número</label>
    <input type="number" id="n2" name="n2" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    if($n1 != 0){
        $div = $n2 / $n1;
        echo "$n2 dividido por $n1 é igual a $div";
    }
    else{
        echo "Não é possível dividir $n2 por 0";
    }

  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>