<?php
include("cabecalho.php");
require('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    try {
        $stmt = $pdo->prepare('INSERT INTO projeto(descriaco,tipo) VALUES (?,?)');
        if ($stmt->execute([$descricao,$tipo])) {
            header('location: projeto.php?cadastro=true');
        } else header('location: projeto.php?cadastro=false');
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<h1>Novo Projeto</h1>
<form method="post" class="p-3">
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" id="descricao" name="descricao" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo do projeto:</label>
        <select id="tipo" name="tipo" class="form-select" required="">
            <option value="Voluntariado ambiental">Voluntariado ambiental</option>
            <option value="Voluntariado social">Voluntariado social</option>
            <option value="Voluntariado educacional">Voluntariado educacional</option>
            <option value="Voluntariado em proteção animal">Voluntariado em proteção animal</option>
            <option value="Voluntariado em saúde e bem-estar">Voluntariado em saúde e bem-estar</option>
        </select>
    </div>
    <button type="submit" class="btn btn-laranja">Enviar</button>
    <button onclick="history.back();" type="button" class="btn btn-secondary">Voltar</button>
</form>


<?php
include("rodape.php");
?>