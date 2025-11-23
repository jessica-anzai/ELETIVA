<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare("SELECT * FROM projeto WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $projeto = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar categoria: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("DELETE from projeto WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('location: projeto.php?excluir=true');
        } else {
            header('location: projeto.php?excluir=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<h1>Consultar Voluntário</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $projeto['id'] ?>">
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea disabled id="descricao" name="descricao" class="form-control" rows="4" required=""><?= $projeto['descriaco'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo do projeto:</label>
        <select disabled id="tipo" name="tipo" class="form-select" required="">
            <option value="Voluntariado ambiental" <?= ($projeto['tipo'] == 'Voluntariado ambiental') ? 'selected' : '' ?>>Voluntariado ambiental</option>
            <option value="Voluntariado social" <?= ($projeto['tipo'] == 'Voluntariado social') ? 'selected' : '' ?>>Voluntariado social</option>
            <option value="Voluntariado educacional" <?= ($projeto['tipo'] == 'Voluntariado educacional') ? 'selected' : '' ?>>Voluntariado educacional</option>
            <option value="Voluntariado em proteção animal" <?= ($projeto['tipo'] == 'Voluntariado em proteção animal') ? 'selected' : '' ?>>Voluntariado em proteção animal</option>
            <option value="Voluntariado em saúde e bem-estar" <?= ($projeto['tipo'] == 'Voluntariado em saúde e bem-estar') ? 'selected' : '' ?>>Voluntariado em saúde e bem-estar</option>
        </select>

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