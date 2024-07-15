<?php
// Inclui o arquivo de configuração para conexão com o banco de dados
include('config.php');

// Inicia a sessão (se ainda não estiver iniciada)
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Obtém os dados do formulário
	$imposto = $_POST['imposto'];
	$data_vencimento = $_POST['data_vencimento'];
	$status = $_POST['status'];
	$empresa_id = $_POST['empresa_id'];
	$usuario_id = $_SESSION['usuario_id']; // Obtém o usuario_id da sessão

	// Prepara e executa a inserção no banco de dados
	$stmt = $conn->prepare("INSERT INTO entregas (imposto, data_vencimento, status, empresa_id, usuario_id) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssi", $imposto, $data_vencimento, $status, $empresa_id, $usuario_id);


	if ($stmt->execute()) {
		// Exibe um alerta de sucesso
		echo "<script>alert('Imposto cadastrado com sucesso!');</script>";
		// Redireciona para a página dashboard.php após 1 segundo
		echo "<meta http-equiv='refresh' content='1;url=cadastra_entrega.php'>";
		// Certifique-se de terminar a execução após o redirecionamento
		exit;
	} else {
		echo "Erro ao cadastrar entrega: " . $stmt->error;
	}

	// Fecha a declaração
	$stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
