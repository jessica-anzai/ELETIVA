<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | n'GO - Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="p-4 bg-white rounded shadow-custom form-container" method="POST">
    <?php
      if (isset($_GET['cadastro'])) {
        $cadastro = $_GET['cadastro'];
        if ($cadastro) {
          echo "<p class='text-success'>Cadastro realizado com sucesso</p>";
        } else {
          echo "<p class='text-success'>Erro ao realizar o cadastro!</p>";
        }
      }
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('conexao.php');
        $username = $_POST['username'];
        $senha = $_POST['senha'];
        try {
          $stmt = $pdo->prepare('SELECT * FROM voluntario WHERE username = ?');
          $stmt->execute([$username]);
          $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['acesso'] = true;
            $_SESSION['nome'] = $usuario['nome'];

            header('location: principal.php');
          } else {
            echo "<p class='text-danger'>Credenciais inválidas!!</p>";
          }
        } catch (\Exception $e) {
          echo "Erro: " . $e->getMessage();
        }
      }
      ?>
      <div class="text-center mb-4">
        <img src="ngo.png" alt="Logo ONG" style="width: 70px;" class="mb-2">
        <p class="text-muted small mb-0">Gerenciamento de Atividades</p>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Digite o username" required />
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label fw-semibold">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required />
      </div>

      <button type="submit" class="btn btn-laranja w-100 mb-3">Entrar</button>

      <div class="text-center">
        <a href="cadastro.php" class="link-laranja">Não tem cadastro? Clique aqui</a>
      </div>
    </form>
  </div>
</body>

</html>