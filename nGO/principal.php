<?php
include("cabecalho.php");
require('conexao.php');

try {
    // Consulta agrupando por tipo
    $stmt = $pdo->query("SELECT tipo, COUNT(*) as total FROM projeto GROUP BY tipo");
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="container mt-4">
    <h2 class="mb-4">Gráfico de Tipos de Projetos</h2>

    <canvas id="graficoProjetos" style="max-height: 350px;"></canvas>
</div>

<!-- CDN do Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Transformando dados do PHP para JavaScript
const labels = <?= json_encode(array_column($dados, 'tipo')) ?>;
const valores = <?= json_encode(array_column($dados, 'total')) ?>;

const ctx = document.getElementById('graficoProjetos').getContext('2d');

new Chart(ctx, {
    type: 'pie', // Pode trocar para 'bar' ou 'doughnut'
    data: {
        labels: labels,
        datasets: [{
            label: 'Quantidade por Tipo',
            data: valores,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});
</script>

<?php
include("rodape.php");
?>
