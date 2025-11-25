<?php
require("cabecalho.php");
require("conexao.php");

try{
    $stmt = $pdo->query('SELECT * FROM projeto');
    $projeto = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar os projetos: '.$e->getMessage();
}

// Buscar atividade
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $pdo->prepare("SELECT * FROM atividade WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $atividade = $stmt->fetch(PDO::FETCH_ASSOC);

        // Buscar o projeto vinculado à atividade
        $stmt = $pdo->prepare("SELECT descriaco FROM projeto WHERE id = ?");
        $stmt->execute([$atividade['id_projeto']]);
        $projetoSelecionado = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo "Erro ao consultar categoria: " . $e->getMessage();
    }
}

// Exclusão
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("DELETE from atividade WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('location: atividade.php?excluir=true');
        } else {
            header('location: atividade.php?excluir=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<h1>Consultar Atividade</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $atividade['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Projeto</label>
        <input type="text" id="projeto" disabled value="<?= $projetoSelecionado['descriaco'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input type="text" disabled value="<?= $atividade['descricao'] ?>" 
               id="descricao" class="form-control">
    </div>

    <p>Deseja excluir esse registro?</p>
    <button type="submit" class="btn btn-danger">Excluir</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>

<?php require("rodape.php"); ?>
