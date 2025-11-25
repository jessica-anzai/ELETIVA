<?php
require("cabecalho.php");
require("conexao.php");

try {
    $stmt = $pdo->prepare("SELECT * FROM agenda WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $agenda = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Erro ao buscar agenda: " . $e->getMessage();
}


try {
    $stmt = $pdo->query("SELECT * FROM voluntario");
    $voluntario = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro ao consultar voluntários: " . $e->getMessage();
}

try {
    $stmt = $pdo->query("SELECT * FROM atividade");
    $atividade = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro ao consultar atividades: " . $e->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM agenda WHERE id = ?");
        if ($stmt->execute([$id])) {
            header("location: agenda.php?excluir=true");
            exit;
        } else {
            header("location: agenda.php?excluir=false");
            exit;
        }
    } catch (Exception $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
}
?>

<h1>Consultar Agenda</h1>

<form method="post">
    <input type="hidden" name="id" value="<?= $agenda['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Voluntário</label>
        <select disabled class="form-select">
            <?php foreach ($voluntario as $v): ?>    
                <option value="<?= $v['id'] ?>" 
                    <?= ($v['id'] == $agenda['voluntario_id']) ? 'selected' : '' ?>>
                    <?= $v['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Atividade</label>
        <select disabled class="form-select">
            <?php foreach ($atividade as $a): ?>    
                <option value="<?= $a['id'] ?>" 
                    <?= ($a['id'] == $agenda['atividade_id']) ? 'selected' : '' ?>>
                    <?= $a['descricao'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Data</label>
        <input 
            disabled 
            type="date" 
            class="form-control"
            value="<?= substr($agenda['datahora'], 0, 10) ?>"
        >
    </div>

    <p>Deseja excluir esse registro?</p>

    <button type="submit" class="btn btn-danger">Excluir</button>
    <button type="button" onclick="history.back()" class="btn btn-secondary">Voltar</button>
</form>

<?php require("rodape.php"); ?>
