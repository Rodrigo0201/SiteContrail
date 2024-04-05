<?php
// Inclua o arquivo wp-config.php do WordPress para ter acesso às configurações do banco de dados
require_once('../../../wp-config.php');

// Tente se conectar ao banco de dados
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verifique se houve erro na conexão
if ($connection->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $connection->connect_error);
} else {
    echo "Conexão bem-sucedida ao banco de dados!";
}

// Feche a conexão
$connection->close();
?>
