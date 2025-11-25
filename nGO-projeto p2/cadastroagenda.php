<?php
include("cabecalho.php");
require('conexao.php');

try{
    $stmt = $pdo->query('SELECT * FROM atividade');
    $atividade = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar as atividades: '.$e->getMessage();
}
try{
    $stmt = $pdo->query('SELECT * FROM voluntario');
    $voluntario = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar os voluntários: '.$e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voluntarioID = $_POST['voluntario'];
    $atividadeID = $_POST['atividade'];
    $datahora = $_POST['datahora'];
    try {
        $stmt = $pdo->prepare('INSERT INTO agenda(atividade_id,voluntario_id,datahora) VALUES (?,?,?)');
        if ($stmt->execute([$voluntarioID,$atividadeID,$datahora])) {
            header('location: agenda.php?cadastro=true');
        } else header('location: agenda.php?cadastro=false');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<h1>Nova Agenda</h1>
<form method="post" class="p-3">
    <div class="mb-3">
              <label for="voluntario" class="form-label">Voluntário</label>
              <select id="voluntario" name="voluntario" class="form-select" required="">
                <?php foreach ($voluntario as $v): ?>    
                    <option value="<?= $v['id'] ?>"><?= $v['nome'] ?></option>
                <?php endforeach; ?>
                
              </select>
            </div><div class="mb-3">
              <label for="atividade" class="form-label">Atividade</label>
              <select id="atividade" name="atividade" class="form-select" required="">
                <?php foreach ($atividade as $a): ?>    
                    <option value="<?= $a['id'] ?>"><?= $a['descricao'] ?></option>
                <?php endforeach; ?>
                
              </select>
            </div><div class="mb-3">
              <label for="datahora" class="form-label">Data</label>
              <input type="date" id="datahora" name="datahora" class="form-control" required="">
            </div>
    <button type="submit" class="btn btn-laranja">Enviar</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>


<?php
include("rodape.php");
?>