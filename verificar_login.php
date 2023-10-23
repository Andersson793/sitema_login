<?php
// Conexão com o banco de dados
$host = "localhost";
$porta = 3306;
$banco = "sistemaDB";
$cliente = "mariaDB";
$password = "3241";

$conectar = pg_connect("host=$host port=$porta dbname=$banco user=$cliente password=$password");


// Verificar a conexão
if (!$conectar) {
    die("Falha na conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login1 = $_POST['login1'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM usuario WHERE login1 = '$login1' AND senha = '$senha' AND ativo = 'true'";
    $result = pg_query($conectar, $sql);

    if ($result) {
        $num_rows = pg_num_rows($result);
        if ($num_rows > 0) {
            // Login bem-sucedido
            echo "Login bem-sucedido!";
        } else {
            // Login falhou
            echo "Login falhou. Verifique suas credenciais ou a ativação da sua conta.";
        }
    } else {
        echo "Erro na consulta SQL: " . pg_last_error($conectar);
    }
}

pg_close($conectar);
?>
