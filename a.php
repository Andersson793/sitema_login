<?php
//configuração (deve ser alterado confome o banco de dados)
$servername = "localhost";
$username = "root";
$password = "3241";
$dbname = "sistemaDB";

$mysqli = mysqli_connect($servername, $username, $password, $dbname);

$mysquery = "
    SELECT * FROM usuarios
";

$result = $mysqli->query($mysquery);

//verificar conexão
if ($mysqli) {
    echo "a conexão foi um sucesso";
}else{
    echo "houve um erro na conexão";
}

while ($row = $result->fetch_row()) {
    echo "$row[0] $row[1] $row[2] $row[3] || ";
}