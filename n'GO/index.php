<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | n'GO - Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    /* ======= Cores e estilo base ======= */
    body {
      background-color: #fff5eb; /* laranja clarinho */
      font-family: 'Segoe UI', sans-serif;
    }

    .btn-laranja {
      background-color: #f39c12;
      color: white;
      font-weight: 500;
      border: none;
    }

    .btn-laranja:hover {
      background-color: #e67e22;
      color: white;
    }

    .text-laranja {
      color: #e67e22;
    }

    .form-container {
      width: 320px;
    }

    .shadow-custom {
      box-shadow: 0 4px 20px rgba(230, 126, 34, 0.2);
    }

    .link-laranja {
      color: #e67e22;
      text-decoration: none;
    }

    .link-laranja:hover {
      color: #d35400;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="p-4 bg-white rounded shadow-custom form-container" method="POST">
    
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
