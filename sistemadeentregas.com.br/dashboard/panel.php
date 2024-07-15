<!DOCTYPE html>
<html>

<head>
    <title>Controle de Impostos</title>
    <link rel="stylesheet" type="text/css" href="style-dashboard.css">
</head>

<body>
    <header>
        <h1>Controle de Impostos</h1>
    </header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="#">Voltar</a>
        <a href="#">Sair</a>
    </nav>

    <div class="container">
        <div class="box-links">
            <a class="btn-link" href="cadastra_empresa.php">
                <img src="../uploads/company.svg" alt="">
                Cadastrar Empresa
            </a>
            <a class="btn-link" href="cadastra_entrega.php">
                <img src="../uploads/tribute.svg" alt="">
                Cadastrar imposto
            </a>
            <a class="btn-link" href="lista_impostos.php">
                <img src="../uploads/eye.svg" alt="">
                Visualizar impostos
            </a>
        </div>
    </div>

    <footer>
        &copy; 2024 Controle de Recebidos
    </footer>

    <script>
        function alterarStatus(id) {
            document.getElementById("status" + id).innerText = "Recebido";
        }

        function alterarStatusNaoRecebido(id) {
            document.getElementById("status" + id).innerText = "Não Recebido";
        }
    </script>
</body>

</html>