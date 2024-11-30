<?php
$servername = "localhost"; // Endereço do servidor
$username = "root"; // Usuário do MySQL
$password = ""; // Senha do MySQL
$dbname = "tuca"; // Nome do banco de dados

// Criar a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
?>
