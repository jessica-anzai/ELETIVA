<?php
include('cabecalho.php');
require('conexao.php');

try{
    $stmt = $pdo->query('SELECT * FROM projeto');
    $projeto = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar os projetos: '.$e->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare('SELECT * FROM atividade WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $atividade = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar a atividade: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $projetoID = $_POST['projeto'];
    $descricao = $_POST['descricao'];
    try{
       $stmt = $pdo->prepare('UPDATE atividade SET descricao = ?, id_projeto = ? WHERE id = ?');
       if($stmt->execute([$descricao, $projetoID, $id])){
            header("location: atividade.php?editar=true");
            exit;
       } else {
            header("location: atividade.php?editar=false");
            exit;
       }
    } catch(Exception $e){
        echo 'Erro ao atualizar: '.$e->getMessage();
    }
}
?>

<h1>Editar Atividade</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Selecione o projeto</label>
        <select id="projeto" name="projeto" class="form-select" required="">
            <?php foreach ($projeto as $p): ?>    
                <option value="<?= $p['id'] ?>"><?= $p['descriaco'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descreva a atividade</label>
        <input type="text" value="<?= $atividade['descricao'] ?>" id="descricao" name="descricao" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>

<?php
include('rodape.php');
?>