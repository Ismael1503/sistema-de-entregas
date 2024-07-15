<?php
// Exibir todos os erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir o arquivo de configuração do banco de dados
require_once 'config.php';

// Iniciar a sessão (se ainda não estiver iniciada)
session_start();

// Verificar se os campos foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar e sanitizar os dados de entrada
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = $_POST["senha"]; // Não precisa de real_escape_string para a senha

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Consulta SQL para inserir um novo usuário
    $sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Usuário cadastrado com sucesso!');
                window.location.href = 'index.php'; // Redireciona para a página de login
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar o usuário. Por favor, tente novamente.');
                window.location.href = 'cadastro.php'; // Redireciona de volta para a página de cadastro
              </script>";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

