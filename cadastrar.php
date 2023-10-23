<?php
$nome = $_POST['nome'];
$login1 = $_POST['login1'];
$senha = ($_POST['senha']);
$ativo = isset($_POST['ativo']) ? 'true' : 'false';

// Conexão com o banco de dados (substitua pelas suas configurações)
$conectar = pg_connect("host=localhost port=5432 dbname=realizar user=postgres password=1234");

if ($conectar) {
    $query = "INSERT INTO usuario (nome, login1, senha, ativo) VALUES ('$nome', '$login1', '$senha', $ativo)";
    $resultado = pg_query($conectar, $query);

    if ($resultado) {
        // Inserção bem-sucedida
        echo "Usuário cadastrado com sucesso";
    } else {
        // Trate os erros se a inserção falhar
        echo "Erro ao inserir dados no PostgreSQL: " . pg_last_error($conectar);
    }

    pg_close($conectar);
} else {
    echo "Erro na conexão com o PostgreSQL.";
}
?>

