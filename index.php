<?php
session_start(); // Inicia a sessão
include 'config.php'; // Inclui o arquivo de configuração para conectar ao banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara e executa a consulta SQL
    $stmt = $conexao->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                header("Location: cardapio.php"); // Redireciona após login bem-sucedido
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Café da Tuca</title>
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="mp">
        <img src="assets/logo.png" alt="Logo" class="logo">
    
        <div class="nav-container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cardapio.php" onclick="checkLogin(event)">Cardápio</a></li>
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

   
    <!-- Carrossel -->
    <div class="carousel">
        <div class="carousel-slide">
          <img src="assets/1.png" alt="Banner 1">
        </div>
        <div class="carousel-slide">
          <img src="assets/sa.png" alt="Banner 2">
        </div>
        <div class="carousel-slide">
         <a href="https://www.ifood.com.br/delivery/limeira-sp/cafe-da-tuca-centro/bc3c274d-e8a6-4118-9f55-b129c067e105?UTM_Medium=share" target="_blank">
             <img src="assets/ifood.png" alt="Banner 3">
         </a>
        </div>
    </div>
    <br>
<br>
    <!-- Frase acima do Formulário -->
<h3 style="color: #E09900; font-size: 25px; text-align: center; margin-bottom: 1rem;">Aqui você encontra o melhor café de Limeira</h3>
<h1 style="color: #E09900; font-size: 15px; text-align: center; margin-bottom: 1rem;">Faça o Login para acessar o cardapio</h1>
<br>
<!-- Formulário de Login -->
<div class="formulario">
    <form method="post">
        <h2 style="color: #E09900; text-align: center;">Login</h2>
        <input type="email" name="email" required placeholder="E-mail">
        <input type="password" name="senha" required placeholder="Senha">
        <a style="color: #E09900; display: block; text-align: center; margin: 1rem 0;" href="add.php">Não tem uma conta? Cadastre-se</a>
        <button type="submit">Login</button> 
    </form>
</div>



   

    <!-- Depoimentos -->
    <section class="depoimentos">
        <h2>O que nossos clientes dizem</h2>
        <div class="depoimento">
            <p>"O melhor café da cidade! O atendimento é impecável e os produtos são sempre frescos!"</p>
            <cite>- Guilherme Seiki</cite>
        </div>
        <div class="depoimento">
            <p>"Adoro o ambiente do Café da Tuca! Perfeito para estudar ou relaxar."</p>
            <cite>- João Haitman</cite>
        </div>
    </section>

    <!-- Seção de Promoções -->
    <section class="promocoes">
        <h2>Promoções da Semana</h2>
        <ul>
            <li>30% de desconto em todos os bolos!</li>
            <li>Compre 1, leve 2 nas coxinhas!</li>
            <li>Café expresso por apenas R$ 2,50!</li>
        </ul>
    </section>

    <!-- Google Maps -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.453152004822!2d-47.40410598927011!3d-22.56214887941364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c880f2c925136b%3A0xf6a2ca8523071f00!2sCafé%20da%20Tuca!5e0!3m2!1spt-BR!2sbr!4v1726323130568!5m2!1spt-BR!2sbr" width="1850" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Café da Tuca - Todos os direitos reservados.</p>
    </footer>

    <!-- JavaScript para o Carrossel -->
    <script>
        let slideIndex = 0;
        carousel();

        function carousel() {
          let slides = document.getElementsByClassName("carousel-slide");
          for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) { slideIndex = 1 }
          slides[slideIndex - 1].style.display = "block";
          setTimeout(carousel, 6000); // Mude a imagem a cada 6 segundos
        }

        function checkLogin(event) {
            event.preventDefault(); // Previne o comportamento padrão do link
            alert("É necessário realizar o login para acessar o cardápio."); // Alerta ao usuário
            window.location.href = "index.php"; // Redireciona para a página inicial
        }

       window.onload = function() {
           const emailField = document.querySelector('input[name="email"]');
           if (emailField) {
               emailField.focus(); // Foca no campo de e-mail
           }
       };

    </script>
</body>
</html>
