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
<h1>Atividade 19 - Cálculo de Dias para Hora/Minuto/Segundo</h1>
<form method="post">
<div class="mb-3">
  <div class="col-5">
    <label for="dias" class="form-label">Informe o tempo em DIAS</label>
    <input type="number" id="dias" name="dias" class="form-control">
  </div>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dias = $_POST['dias'];

   $hora = $dias * 24;
   $minuto = $hora * 60;
   $segundo = $minuto * 60;

   echo "Correspondência do número de dia(s) em:";
   echo "<ul>";
   echo "<li>Horas: $hora</li>";
   echo "<li>Minutos: $minuto</li>";
   echo "<li>Segundos: $segundo</li>";
   echo "</ul>";
    
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>