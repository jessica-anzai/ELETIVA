<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare("SELECT * FROM voluntario WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $voluntario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar categoria: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("DELETE from voluntario WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('location: voluntario.php?excluir=true');
        } else {
            header('location: voluntario.php?excluir=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<h1>Consultar Voluntário</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $voluntario['id'] ?>">
    <div class="row mb-3">
        <div class='col'>
            <label for="nome" class="form-label">Nome:</label>
            <input disabled value="<?= $voluntario['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class='col'>
            <label for="username" class="form-label">Nome de usuário:</label>
            <input disabled value="<?= $voluntario['username'] ?>" type="text" id="username" name="username" class="form-control" required="">
        </div>
    </div>
    <div class="mb-3">
        <div>
            <label for="email" class="form-label">Nome de usuário:</label>
            <input disabled value="<?= $voluntario['email'] ?>" type="text" id="email" name="email" class="form-control" required="">
        </div>
    </div>
    <p>Deseja excluir esse registro?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">
        Voltar
    </button>
</form>

<?php
require("rodape.php");
?>