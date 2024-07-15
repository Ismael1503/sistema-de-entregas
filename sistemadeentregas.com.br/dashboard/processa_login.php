<?php
// Incluir o arquivo de configuração do banco de dados
require_once 'config.php';

// Iniciar a sessão (se ainda não estiver iniciada)
session_start();

// Verificar se os campos foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar e sanitizar os dados de entrada
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = $_POST["password"]; // Não precisa de real_escape_string para a senha

    // Consulta SQL para verificar se o usuário existe na tabela usuarios
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verificar a senha
        if (password_verify($senha, $row['senha'])) {
            // Usuário encontrado, iniciar sessão
            $_SESSION["logged_in"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["usuario_id"] = $row['id']; // Armazena o usuario_id na sessão

            // Redirecionar para a página de dashboard ou outra página de destino
            header("Location: panel.php");
            exit();
        } else {
            // Senha incorreta
            echo "<script>
                    alert('E-mail ou senha incorretos. Por favor, tente novamente.');
                    window.location.href = 'index.php'; // Redireciona de volta para a página de login
                  </script>";
        }
    } else {
        // Usuário não encontrado
        echo "<script>
                alert('E-mail ou senha incorretos. Por favor, tente novamente.');
                window.location.href = 'index.php'; // Redireciona de volta para a página de login
              </script>";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
