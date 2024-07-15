<?php
// Inclui o arquivo de configuração para conexão com o banco de dados
include('config.php');

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Pega os dados enviados do formulário e valida
	$razao_social = isset($_POST['razao_social']) ? trim($_POST['razao_social']) : null;
	$email = isset($_POST['email']) ? trim($_POST['email']) : null;
	$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : null;
	$enquadramento = isset($_POST['enquadramento']) ? trim($_POST['enquadramento']) : null;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

	// Validação básica dos dados recebidos
	if (empty($razao_social) || empty($email) || empty($telefone) || empty($enquadramento) || empty($senha)) {
		die('Todos os campos são obrigatórios.');
	}

	// Hash da senha para armazenamento seguro no banco de dados
	$hashed_password = password_hash($senha, PASSWORD_DEFAULT);

	// Prepara a consulta SQL para inserção dos dados
	$sql = "INSERT INTO empresas (razao_social, email, telefone, enquadramento, senha) VALUES (?, ?, ?, ?, ?)";

	// Prepara a declaração
	if ($stmt = $conn->prepare($sql)) {
		// Vincula os parâmetros à declaração
		$stmt->bind_param('sssss', $razao_social, $email, $telefone, $enquadramento, $hashed_password);

		if ($stmt->execute()) {
			// Exibe um alerta de sucesso
			echo "<script>alert('Empresa cadastrada com sucesso!'); window.location='cadastra_empresa.php';</script>";
			exit; // Certifique-se de terminar a execução após o redirecionamento
		} else {
			echo "Erro ao cadastrar empresa: " . $stmt->error;
		}

		// Fecha a declaração
		$stmt->close();
	} else {
		echo "Erro na preparação da consulta: " . $conn->error;
	}
}

// Fecha a conexão
$conn->close();
