<?php
include 'config.php'; // Inclui o arquivo de configuração para conectar ao banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica se o método é POST
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha

    // Prepara e executa a consulta SQL
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, cep, senha) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssss", $nome, $email, $telefone, $cep, $senha);
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
            header("Location: index.php"); // Redireciona para a página inicial
            exit();
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conexao->error;
    }
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- teste -->
<div class="mp">
        <img src="assets/logo.png" alt="Logo" class="logo">
    
        <div class="nav-container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cardapio.php" >Cardápio</a></li>
                <li><a href="sobre.php">Sobre</a></li>
           
            </ul>
        </div>
        
        <div class="logors">
            <a href="https://www.instagram.com/cafedatuca/" target="_blank">
                <img src="assets/inta.png" alt="Instagram" class="icon">
            </a>
            <a href="https://www.facebook.com/cafedatuca" target="_blank">
                <img src="assets/facebook.png" alt="Facebook" class="icon">
            </a>
        </div>
    </div>

    <!-- formulario do cadastro -->
    <div class="formulario">
    <form method="post">
        <h2 style="color: #E09900; text-align: center;">Cadastro</h2>
        <input type="text" name="nome" required placeholder="Nome">
        <input type="email" name="email" required placeholder="E-mail">
        <input type="number" name="telefone" required placeholder="Telefone">
        <input type="text" name="cep" required placeholder="CEP">
        <input type="password" name="senha" required placeholder="Senha">
        <a style="color: #E09900; display: block; text-align: center; margin: 1rem 0;" href="add.php">Não tem uma conta? Cadastre-se</a>
        <button type="submit">Login</button> 
    </form>
</div>
</body>
</html>

