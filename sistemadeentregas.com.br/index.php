<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle de Impostos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('uploads/teste.png') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Arial Black', sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        .toolbar {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 70px;
            padding: 0 20px;
            gap: 20px;
        }

        .toolbar button {
            background: none;
            border: none;
            padding: 15px 30px;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 18px;
            font-weight: bold;
        }

        .toolbar button:hover {
            transform: translateY(-2px);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.3);
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
            color: #000000; /* Cor cinza claro */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .content h1 {
            font-size: 48px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .content h2{
            font-size: 48px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .description {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="toolbar">
        <a href="login_cliente.php">Login cliente</a>
        <button onclick="showDescription()">Sobre</button>
    </div>

    <div class="content">
        <h1>Seja Bem-vindo ao</h1>
        <h2>Sistema de Controle de Impostos</h2>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        
    </div>

    <div class="description" id="description">
        <h2>Sobre o Sistema</h2>
        <p>O Sistema de Controle de Impostos foi projetado para oferecer a você uma maneira eficaz e organizada de gerenciar suas entregas e impostos. Simplifique seu processo de controle com nossa plataforma intuitiva e fácil de usar. Tenha o controle total sobre suas obrigações fiscais e mantenha seus registros atualizados de forma simples e eficiente.</p>
    </div>

    <script>
        function redirectToLogin() {
            // Redireciona o usuário para a página de login
            window.location.href = "login.html";
        }

        function redirectToCadastro() {
            // Redireciona o usuário para a página de cadastro
            window.location.href = "cadastro.html";
        }

        function showDescription() {
            // Animação suave para rolar até a seção de descrição
            var descriptionOffset = document.getElementById("description").offsetTop;
            window.scrollTo({
                top: descriptionOffset,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>
