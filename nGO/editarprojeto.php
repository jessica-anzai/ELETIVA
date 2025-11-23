<?php
include('cabecalho.php');
require('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare('SELECT * FROM projeto WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $projeto = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar o projeto: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    try {
        $stmt = $pdo->prepare('UPDATE projeto SET descriaco = ?, tipo = ? WHERE id = ?');
        if ($stmt->execute([$descricao, $tipo, $id])) {
            header('location: projeto.php?editar=true');
        } else header('location: projeto.php?editar=false');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<h1>Editar Dados do Projeto</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required=""><?= $projeto['descriaco'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo do projeto:</label>
        <select id="tipo" name="tipo" class="form-select" required="">
            <option value="Voluntariado ambiental" <?= ($projeto['tipo'] == 'Voluntariado ambiental') ? 'selected' : '' ?>>Voluntariado ambiental</option>
            <option value="Voluntariado social" <?= ($projeto['tipo'] == 'Voluntariado social') ? 'selected' : '' ?>>Voluntariado social</option>
            <option value="Voluntariado educacional" <?= ($projeto['tipo'] == 'Voluntariado educacional') ? 'selected' : '' ?>>Voluntariado educacional</option>
            <option value="Voluntariado em proteção animal" <?= ($projeto['tipo'] == 'Voluntariado em proteção animal') ? 'selected' : '' ?>>Voluntariado em proteção animal</option>
            <option value="Voluntariado em saúde e bem-estar" <?= ($projeto['tipo'] == 'Voluntariado em saúde e bem-estar') ? 'selected' : '' ?>>Voluntariado em saúde e bem-estar</option>
        </select>

    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>

<?php
include('rodape.php');
?>