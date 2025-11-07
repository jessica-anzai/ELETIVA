<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
require("conexao.php");
$nome = $_POST['nome'];
$username = $_POST['username'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'],PASSWORD_BCRYPT);

try{
  $stmt = $pdo->prepare("INSERT INTO voluntario(nome,username,email,senha) values(?,?,?,?)");
  if($stmt->execute([$nome,$username,$email,$senha])){
  header("location: index.php?cadastro=true;"); exit;
  }
  else header("location: index.php?cadastro=false;"); exit;
} catch(Exception $e){
  echo "Erro ao executar o comando SQL: " . $e->getMessage();
}}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro | n'GO - Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="p-4 bg-white rounded shadow-custom form-container" method="POST">

      
      <div class="text-center mb-4">
        <img src="ngo.png" alt="Logo ONG" style="width: 70px;" class="mb-2">
        <h4 class="text-laranja">Crie sua conta</h4>
        <p class="text-muted small mb-0">Gerenciamento de Atividades</p>
      </div>

      <div class="mb-3">
        <label for="nome" class="form-label fw-semibold">Nome completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required />
      </div>

      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Escolha um username" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required />
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label fw-semibold">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Crie uma senha" required />
      </div>

      <button type="submit" class="btn btn-laranja w-100 mb-3">Cadastrar</button>

      <div class="text-center">
        <a href="index.php" class="link-laranja">Já tem uma conta? Faça login</a>
      </div>
    </form>
  </div>
</body>

</html>