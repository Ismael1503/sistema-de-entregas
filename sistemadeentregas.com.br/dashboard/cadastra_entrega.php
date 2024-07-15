<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Entrega</title>
	<link rel="stylesheet" type="text/css" href="style-dashboard.css">
</head>

<body>
	<header>
		<h1>Cadastro de Impostos</h1>
	</header>

	<nav>
		<a href="index.php">Inicio</a>
		<a href="panel.php">Voltar</a>
		<a href="index.php">Sair</a>
	</nav>
	<div class="container">
		<div class="cadastro-box">
			<h2>Cadastro de imposto</h2>
			<form id="cadastroImpostoForm" action="processa_entrega.php" method="POST">
				<div class="form-group">
					<label for="imposto">Imposto</label>
					<input type="text" id="imposto" name="imposto" required>
				</div>
				<div class="form-group">
					<label for="data_vencimento">Data de Vencimento</label>
					<input type="date" id="data_vencimento" name="data_vencimento" required>
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<select id="status" name="status" required>
						<option value="Pendente">Pendente</option>
						<option value="Recebido">Recebido</option>
						<option value="Não Recebido">Não Recebido</option>
					</select>
				</div>
				<div class="form-group">
					<label for="empresa_id">Selecione a Empresa</label>
					<select id="empresa_id" name="empresa_id" required>
						<option value="">Selecione...</option>
						<?php
						// Inclui o arquivo de configuração para conexão com o banco de dados
						include('config.php');

						// Consulta SQL para buscar todas as empresas cadastradas
						$sql = "SELECT id, razao_social FROM empresas ORDER BY razao_social";
						$result = $conn->query($sql);

						// Itera sobre o resultado e cria as opções do select
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<option value=\"" . $row['id'] . "\">" . $row['razao_social'] . "</option>";
							}
						}

						// Fecha a conexão
						$conn->close();
						?>
					</select>
				</div>
				<!-- Adiciona um campo oculto para o usuario_id -->
				<input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
				<button type="submit" class="btn">Cadastrar</button>
				<div class="error-message"></div>
			</form>
		</div>
	</div>
	<footer>
		&copy; 2024 Cadastro de Impostos
	</footer>
</body>

</html>
