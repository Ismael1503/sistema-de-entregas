<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Controle de Entregas</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #344353;
			color: white;
			text-align: center;
			padding: 20px 0;
		}

		h1 {
			margin: 0;
		}

		nav {
			background-color: #333;
			color: white;
			text-align: center;
			padding: 10px 0;
		}

		nav a {
			text-decoration: none;
			color: white;
			margin: 0 10px;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		table,
		th,
		td {
			border: 1px solid #ccc;
		}

		th,
		td {
			padding: 10px;
			text-align: left;
		}

		th {
			background-color: #333;
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.btn {
			padding: 10px 20px;
			border: none;
			cursor: pointer;
		}

		.btn-recebido {
			background-color: #28a745;
			color: white;
		}

		.btn-nao-recebido {
			background-color: #dc3545;
			color: white;
		}

		.btn:hover {
			opacity: 0.8;
		}

		footer {
			background-color: #333;
			color: white;
			text-align: center;
			padding: 10px 0;
			position: fixed;
			bottom: 0;
			width: 100%;
		}
	</style>
</head>

<body>
	<header>
		<h1>Controle de Entregas</h1>
	</header>
	<nav>
		<a href="index.php">Inicio</a>
		<a href="index.php">Voltar</a>
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
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				<!-- Linhas da tabela serão inseridas aqui pelo PHP -->
				<?php
				// Incluir o arquivo de configuração para conexão com o banco de dados
				include('config.php');

				// Iniciar a sessão
				session_start();

				// Verificar se o usuário está logado
				if (isset($_SESSION['email'])) {
					$email = $_SESSION['email'];

					// Consulta para obter todas as entregas com os dados da empresa logada
					$sql = "SELECT e.id, e.imposto, e.data_vencimento, e.status, emp.razao_social AS cliente
                            FROM entregas e
                            INNER JOIN empresas emp ON e.empresa_id = emp.id 
                            WHERE emp.email = ?";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('s', $email);
					$stmt->execute();
					$result = $stmt->get_result();

					// Verifica se há resultados e, se sim, exibe-os
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . htmlspecialchars($row['imposto']) . "</td>";
							echo "<td>" . htmlspecialchars($row['cliente']) . "</td>";

							// Formata a data de vencimento para o padrão brasileiro
							$data_vencimento_formatada = date('d/m/Y', strtotime($row['data_vencimento']));
							echo "<td>" . htmlspecialchars($data_vencimento_formatada) . "</td>";

							echo "<td id='status" . $row['id'] . "'>" . htmlspecialchars($row['status']) . "</td>";
							echo "<td>";
							echo "<form action='altera_status_entrega.php' method='POST'>";
							echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";

							// Verifica o status para decidir quais botões mostrar
							echo "<button type='submit' class='btn btn-recebido' name='status' value='Recebido'>Recebido</button>";
							echo "<button type='submit' class='btn btn-nao-recebido' name='status' value='Não Recebido'>Não Recebido</button>";
							
							echo "</form>";
							echo "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='5'>Nenhuma entrega encontrada.</td></tr>";
					}


					// Fecha a declaração
					$stmt->close();
				} else {
					echo "<tr><td colspan='5'>Por favor, faça login para ver suas entregas.</td></tr>";
				}

				// Fecha a conexão com o banco de dados
				$conn->close();
				?>
			</tbody>
		</table>
	</div>

	<footer>
		&copy; 2024 Controle de Recebidos
	</footer>
</body>

</html>