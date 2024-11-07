<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Funcionário</h1>
        <form action="" method="post">
            <label for="fun_nome">Nome do Funcionário:</label>
            <input type="text" id="fun_nome" name="fun_nome" required>

            <label for="fun_cargo">Cargo:</label>
            <input type="text" id="fun_cargo" name="fun_cargo" required>

            <input type="submit" name="submit" value="Cadastrar">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "empresa";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $fun_nome = $_POST['fun_nome'];
            $fun_cargo = $_POST['fun_cargo'];

            $sql = "INSERT INTO tbl_funcionario (fun_nome, fun_cargo) VALUES ('$fun_nome', '$fun_cargo')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Funcionário cadastrado com sucesso!</p>";
            } else {
                echo "<p>Erro ao cadastrar: " . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
