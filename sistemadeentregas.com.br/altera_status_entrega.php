<?php
// Incluir o arquivo de configuração para conexão com o banco de dados
include('config.php');

// Verificar se o método de requisição é POST e se o parâmetro 'id' está definido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Obter o ID da entrega a partir do parâmetro POST
    $id_entrega = $_POST['id'];

    // Consulta SQL para obter o status atual da entrega
    $sql = "SELECT status FROM entregas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_entrega);
    $stmt->execute();
    $stmt->bind_result($status_atual);
    $stmt->fetch();
    $stmt->close();

    // Verificar se o status atual é 'Recebido'
    if ($status_atual == 'Recebido') {
        echo "<script>alert('O status não pode ser alterado após ser marcado como Recebido.'); window.location='controle_entregas_cliente.php';</script>";
    } else {
        // Verificar se o parâmetro 'status' está definido e é válido ('Recebido' ou 'Não Recebido')
        if (isset($_POST['status']) && ($_POST['status'] == 'Recebido' || $_POST['status'] == 'Não Recebido')) {
            $novo_status = $_POST['status'];

            // Consulta SQL para atualizar o status da entrega no banco de dados
            $sql = "UPDATE entregas SET status = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $novo_status, $id_entrega);
            
            // Executar a atualização
            if ($stmt->execute()) {
                // Redirecionar para a página controle_entregas_cliente.php após a atualização
                echo "<script>alert('Status da entrega atualizado com sucesso.'); window.location='controle_entregas_cliente.php';</script>";
            } else {
                // Erro na execução da atualização
                echo "Erro ao atualizar o status da entrega: " . $conn->error;
            }

            // Fechar a declaração
            $stmt->close();
        } else {
            echo "Parâmetro 'status' inválido ou não definido.";
        }
    }
} else {
    echo "Requisição inválida.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
