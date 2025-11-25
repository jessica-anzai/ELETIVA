<?php
include("cabecalho.php");
require('conexao.php');

try{
    $stmt = $pdo->query('SELECT * FROM projeto');
    $projeto = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar os projetos: '.$e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projetoID = $_POST['projeto'];
    $descricao = $_POST['descricao'];
    try {
        $stmt = $pdo->prepare('INSERT INTO atividade(descricao,id_projeto) VALUES (?,?)');
        if ($stmt->execute([$descricao,$projetoID])) {
            header('location: atividade.php?cadastro=true');
        } else header('location: atividade.php?cadastro=false');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<h1>Nova Atividade</h1>
<form method="post" class="p-3">
    <div class="mb-3">
        <label for="nome" class="form-label">Selecione o projeto</label>
        <select id="projeto" name="projeto" class="form-select" required="">
            <option selected value="">Selecione uma opção</option> 
            <?php foreach ($projeto as $p): ?>   
                <option value="<?= $p['id'] ?>"><?= $p['descriaco'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descreva a atividade</label>
        <input type="text" id="descricao" name="descricao" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-laranja">Enviar</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>


<?php
include("rodape.php");
?>