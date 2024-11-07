<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Registro</title>
</head>
<body>
    <h1>Cadastro de Registro</h1>
    <form action="" method="post">
        <label for="reg_data">Data:</label><br>
        <input type="date" id="reg_data" name="reg_data" required><br><br>
        
        <label for="reg_hora">Hora:</label><br>
        <input type="text" id="reg_hora" name="reg_hora" required><br><br>

        <label for="fun_codigo">Código do Funcionário:</label><br>
        <input type="number" id="fun_codigo" name="fun_codigo" required><br><br>
        
        <input type="submit" name="submit" value="Cadastrar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "empresa";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $reg_data = $_POST['reg_data'];
        $reg_hora = $_POST['reg_hora'];
        $fun_codigo = $_POST['fun_codigo'];

        $sql = "INSERT INTO tbl_registros (reg_data, reg_hora, fun_codigo) VALUES ('$reg_data', '$reg_hora', '$fun_codigo')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
