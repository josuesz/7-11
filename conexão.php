<?php
// Configurações para conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor
$username = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "empresa"; // Nome do banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificação de erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!<br>";

// Criar a tabela tbl_funcionario
$sql_create_funcionario = "CREATE TABLE IF NOT EXISTS tbl_funcionario (
    fun_codigo INT PRIMARY KEY AUTO_INCREMENT,
    fun_nome VARCHAR(45),
    fun_cargo VARCHAR(45)
)";
if ($conn->query($sql_create_funcionario) === TRUE) {
    echo "Tabela tbl_funcionario criada com sucesso!<br>";
} else {
    echo "Erro ao criar a tabela tbl_funcionario: " . $conn->error . "<br>";
}

// Criar a tabela tbl_registros
$sql_create_registros = "CREATE TABLE IF NOT EXISTS tbl_registros (
    reg_codigo INT PRIMARY KEY AUTO_INCREMENT,
    reg_data DATE,
    reg_hora VARCHAR(45),
    fun_codigo INT,
    CONSTRAINT fk_fun_codigo FOREIGN KEY (fun_codigo) REFERENCES tbl_funcionario (fun_codigo)
)";
if ($conn->query($sql_create_registros) === TRUE) {
    echo "Tabela tbl_registros criada com sucesso!<br>";
} else {
    echo "Erro ao criar a tabela tbl_registros: " . $conn->error . "<br>";
}

// Consulta de exemplo para verificar os dados em tbl_funcionario
$sql_select_funcionario = "SELECT * FROM tbl_funcionario";
$result = $conn->query($sql_select_funcionario);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["fun_codigo"] . " - Nome: " . $row["fun_nome"] . " - Cargo: " . $row["fun_cargo"] . "<br>";
    }
} else {
    echo "0 resultados encontrados na tabela tbl_funcionario.<br>";
}

// Consulta de exemplo para verificar os dados em tbl_registros
$sql_select_registros = "SELECT * FROM tbl_registros";
$result = $conn->query($sql_select_registros);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["reg_codigo"] . " - Data: " . $row["reg_data"] . " - Hora: " . $row["reg_hora"] . " - Fun_Codigo: " . $row["fun_codigo"] . "<br>";
    }
} else {
    echo "0 resultados encontrados na tabela tbl_registros.<br>";
}

// Fechar a conexão
$conn->close();
?>
