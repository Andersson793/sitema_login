<?php
// Conexão com o banco de dados PostgreSQL (substitua pelas suas configurações)
$conectar = pg_connect("host=localhost port=5432 dbname=realizar user=postgres password=1234");

// Consulta para selecionar todos os registros da tabela USUARIO
$query = "SELECT id_usuario, nome, login1, ativo FROM usuario";
$result = pg_query($conectar, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Registros</title>
</head>
<body>
    <h2>Lista de Registros</h2>
    <table>
        <tr>
            <th>Id_Usuario</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Ativo</th>
        </tr>
        <?php
        // Loop para exibir os registros
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_usuario'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['login1'] . "</td>";
            
            // Verifica se o usuário está ativo ou inativo
            if ($row['ativo'] == 't') {
                echo "<td>Sim</td>";
            } else {
                echo "<td>Não</td>";
            }
            
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
