<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal com Menus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .menu {
            background-color: #333;
            overflow: hidden;
        }
        .menu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .menu a:hover {
            background-color: #575757;
            color: white;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <?php
        // Configuração da conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "empresa";

        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta para buscar os menus (neste caso, usando os nomes de tbl_funcionario)
        $sql = "SELECT fun_nome FROM tbl_funcionario";
        $result = $conn->query($sql);

        // Gerar itens de menu com base nos registros
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="#">' . htmlspecialchars($row["fun_nome"]) . '</a>';
            }
        } else {
            echo '<a href="#">Nenhum Menu Cadastrado</a>';
        }

        // Fechar conexão
        $conn->close();
        ?>
    </div>

    <div class="container">
        <h1>Página Principal</h1>
        <p>Bem-vindo à página principal. Utilize o menu acima para navegar.</p>
    </div>
</body>
</html>
