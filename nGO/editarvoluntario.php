<?php
include('cabecalho.php');
require('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare('SELECT * FROM voluntario WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $voluntario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar o voluntário: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    try {
        $stmt = $pdo->prepare('UPDATE voluntario SET nome = ?, email = ? WHERE id = ?');
        if ($stmt->execute([$nome, $email, $id])) {
            header('location: voluntario.php?editar=true');
        } else header('location: voluntario.php?editar=false');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<h1>Editar Dados do Voluntário</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="row mb-3">
        <div class='col'>
            <label for="nome" class="form-label">Nome:</label>
            <input value="<?= $voluntario['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class='col'>
            <label for="username" class="form-label">Nome de usuário:</label>
            <input disabled value="<?= $voluntario['username'] ?>" type="text" id="username" name="username" class="form-control" required="">
        </div>
    </div>
    <div class="mb-3">
        <div>
            <label for="email" class="form-label">Nome de usuário:</label>
            <input value="<?= $voluntario['email']?>" type="text" id="email" name="email" class="form-control" required="">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>

<?php
include('rodape.php');
?>