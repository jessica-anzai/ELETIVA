<?php
include("cabecalho.php");
require('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $senha = password_hash($_POST['senha'],PASSWORD_BCRYPT);
    try {
        $stmt = $pdo->prepare('INSERT INTO voluntario(nome,email,username,senha) VALUES (?,?,?,?)');
        if ($stmt->execute([$nome,$email,$username,$senha])) {
            header('location: voluntario.php?cadastro=true');
        } else header('location: voluntario.php?cadastro=false');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<h1>Novo Voluntário</h1>
<form method="post" class="p-3">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Nome de Usuário</label>
        <input type="text" id="username" name="username" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" id="email" name="email" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-laranja">Enviar</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>


<?php
include("rodape.php");
?>