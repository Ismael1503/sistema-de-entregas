<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os impostos</title>
    <link rel="stylesheet" type="text/css" href="style-dashboard.css">
</head>

<body>
    <header>
        <h1>Todos os impostos</h1>
    </header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="panel.php">Voltar</a>
        <a href="index.php">Sair</a>
    </nav>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Imposto</th>
                    <th>Nome do Cliente</th>
                    <th>Data de Vencimento</th>
                    <th>Status de Entrega</th>
                </tr>
            </thead>
            <tbody>
                <!-- Linhas da tabela serão inseridas aqui pelo PHP -->
                <?php
                // Inclui o arquivo de configuração para conexão com o banco de dados
                include('config.php');

                // Consulta para obter todas as entregas com os dados da empresa
                $sql = "SELECT e.id, e.imposto, e.data_vencimento, e.status, e.acao, emp.razao_social AS cliente
                            FROM entregas e
                            INNER JOIN empresas emp ON e.empresa_id = emp.id";
                $result = $conn->query($sql);

                // Verifica se há resultados e, se sim, exibe-os
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['imposto']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cliente']) . "</td>";
                        $data_vencimento_formatada = date('d/m/Y', strtotime($row['data_vencimento']));
						echo "<td>" . htmlspecialchars($data_vencimento_formatada) . "</td>";
                        echo "<td id='status" . $row['id'] . "'>" . htmlspecialchars($row['status']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhuma entrega encontrada.</td></tr>";
                }

                // Fecha a conexão com o banco de dados
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>