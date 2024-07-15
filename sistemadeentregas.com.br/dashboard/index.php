<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('../uploads/fundo.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-box {
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        form .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555555;
        }
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        form input[type="email"]:focus,
        form input[type="password"]:focus {
            border-color: #4caf50;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #4caf50;
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        .back-button {
            width: 100%;
            padding: 10px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #c0392b;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Sistema de Entregas de Impostos</h2>
            <form id="loginForm" action="processa_login.php" method="post">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <button class="back-button" onclick="redirectToPreviousPage()">Voltar</button>
            <a href="cadastra_user.php" id="cadastroButton">Registrar-se</a>
            <div class="error-message"></div>
        </div>
    </div>
    <script>
        function redirectToPreviousPage() {
            window.history.back();
        }
    </script>
</body>
</html>
