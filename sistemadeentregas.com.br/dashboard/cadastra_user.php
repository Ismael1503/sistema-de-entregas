<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background: url('../uploads/registro.jpg') no-repeat center center/cover;
			height: 100vh;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			font-family: 'Arial Black', sans-serif;
		}

		.container {
			text-align: center;
			background-color: rgba(255, 255, 255, 0.8);
			/* Fundo branco transparente para o formulário */
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			width: 400px;
			padding: 20px;
			margin-top: 20px;
		}

		.cadastro-box {
			padding: 40px;
			background-color: #ffffff;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		}

		h2 {
			margin-bottom: 30px;
			color: #333333;
		}

		.input-group {
			margin-bottom: 20px;
			text-align: left;
		}

		.input-group label {
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
			color: #555555;
		}

		.input-group input {
			width: calc(100% - 22px);
			padding: 10px;
			font-size: 16px;
			border: 1px solid #dddddd;
			border-radius: 5px;
		}

		button {
			width: 100%;
			padding: 10px;
			background-color: #45a049;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s;
			font-weight: 800;
			font-size: 16px; 
		}

		button:hover {
			background-color: #43b148;
		}

		.error-message {
			color: red;
			margin-top: 10px;
		}

		.listaTiposEmpresas {
			display: none;
			list-style: none;
			padding: 0;
			margin: 0;
		}

		.listaTiposEmpresas li {
			cursor: pointer;
			padding: 10px;
		}

		.listaTiposEmpresas li:hover {
			background-color: #f0f0f0;
		}

		.back-button {
			width: 100%;
			padding: 10px 0;
			background-color: #f80000;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s;
			margin-top: 10px;
			display: block;
			text-decoration: none;
		}

		.back-button:hover {
			background-color: #ff0000;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="cadastro-box">
			<h2>Cadastro de usuário</h2>
			<form id="cadastroForm" action="processa_user.php" method="POST">
				<div class="input-group">
					<label for="email">E-mail</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="input-group">
					<label for="senha">Senha</label>
					<input type="password" id="senha" name="senha" required>
				</div>
				<button type="submit">Cadastrar</button>
				<div class="error-message"></div>
			</form>
			<a href="index.php" class="back-button">Voltar</a>
		</div>
	</div>

	<script>
		const tipoEmpresaInput = document.getElementById('tipoEmpresa');
		const listaTiposEmpresas = document.getElementById('listaTiposEmpresas');

		tipoEmpresaInput.addEventListener('click', function() {
			listaTiposEmpresas.style.display = 'block';
		});

		listaTiposEmpresas.addEventListener('click', function(event) {
			if (event.target.id) {
				tipoEmpresaInput.value = event.target.innerText;
				listaTiposEmpresas.style.display = 'none';
			}
		});

		// Fechar a lista se clicar fora dela
		document.addEventListener('click', function(event) {
			if (event.target !== tipoEmpresaInput) {
				listaTiposEmpresas.style.display = 'none';
			}
		});
	</script>
</body>

</html>