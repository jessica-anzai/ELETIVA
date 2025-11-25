<?php
include('cabecalho.php');
require('conexao.php');

// Buscar atividades
try {
    $stmt = $pdo->query('SELECT * FROM atividade');
    $atividade = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    echo 'Erro ao consultar as atividades: ' . $e->getMessage();
}

// Buscar voluntários
try {
    $stmt = $pdo->query('SELECT * FROM voluntario');
    $voluntario = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    echo 'Erro ao consultar os voluntários: ' . $e->getMessage();
}

// Buscar agenda pelo ID
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM agenda WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $agenda = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar a agenda: " . $e->getMessage();
    }
}

// Atualizar agenda
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $voluntarioID = $_POST['voluntario'];
    $atividadeID = $_POST['atividade'];
    $datahora = $_POST['datahora'];

    try {
        $stmt = $pdo->prepare('UPDATE agenda SET atividade_id = ?, voluntario_id = ?, datahora = ? WHERE id = ?');
        if ($stmt->execute([$atividadeID, $voluntarioID, $datahora, $id])) {
            header("location: agenda.php?editar=true");
            exit;
        } else {
            header("location: agenda.php?editar=false");
            exit;
        }
    } catch (Exception $e) {
        echo 'Erro ao atualizar: ' . $e->getMessage();
    }
}
?>

<h1>Editar Agenda</h1>

<form method="post">
    <input type="hidden" name="id" value="<?= $agenda['id'] ?>">

    <div class="mb-3">
        <label for="voluntario" class="form-label">Voluntário</label>
        <select id="voluntario" name="voluntario" class="form-select" required="">
            <?php foreach ($voluntario as $v): ?>    
                <option value="<?= $v['id'] ?>"
                    <?= ($agenda['voluntario_id'] == $v['id']) ? 'selected' : '' ?>>
                    <?= $v['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="atividade" class="form-label">Atividade</label>
        <select id="atividade" name="atividade" class="form-select" required="">
            <?php foreach ($atividade as $a): ?>    
                <option value="<?= $a['id'] ?>"
                    <?= ($agenda['atividade_id'] == $a['id']) ? 'selected' : '' ?>>
                    <?= $a['descricao'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="datahora" class="form-label">Data</label>
        <input type="date" id="datahora" name="datahora" value="<?= $agenda['datahora'] ?>" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>

<?php include('rodape.php'); ?>
