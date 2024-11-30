<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - Café da Tuca</title>
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="mp">
        <img src="assets/logo.png" alt="Logo" class="logo">
        
        <div class="nav-container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cardapio.php" onclick="checkLogin(event)">Cardápio</a></li>
                <li><a href="sobre.php">Sobre</a></li>
            </ul>
        </div>
        
        <div class="logors">
            <a href="https://www.instagram.com/cafedatuca/" target="_blank"><img src="assets/inta.png" alt="Instagram" class="icon"></a>
            <a href="https://www.facebook.com/cafedatuca" target="_blank"><img src="assets/facebook.png" alt="Facebook" class="icon"></a>
        </div>
    </header>

    <main class="sobre">
        <h1 class="titulo">Sobre Nós</h1>
        <p class="descricao">
            No Café da Tuca, oferecemos uma experiência única para os amantes de café em Limeira. Com uma variedade de grãos selecionados e uma paixão pelo que fazemos, nosso objetivo é proporcionar momentos especiais a cada xícara servida.
        </p>

        <section class="missao">
            <h2>Missão</h2>
            <p>
                Proporcionar a melhor experiência em café, com produtos de qualidade e um ambiente acolhedor.
            </p>
        </section>

        <section class="visao">
            <h2>Visão</h2>
            <p>
                Ser reconhecido como o melhor café de Limeira, promovendo a cultura do café e o bem-estar de nossos clientes.
            </p>
        </section>

        <section class="valores">
            <h2>Valores</h2>
            <ul>
                <li>Qualidade</li>
                <li>Transparência</li>
                <li>Sustentabilidade</li>
                <li>Atendimento ao cliente</li>
            </ul>
        </section>

        <section class="contato">
            <h2>Contato</h2>
            <p>Para mais informações, entre em contato conosco:</p>

            <form method="post">
                <input type="text" name="nome" placeholder="Seu Nome" required>
                <input type="email" name="email" placeholder="Seu E-mail" required>
                <textarea name="mensagem" placeholder="Sua Mensagem" required></textarea>
                <button type="submit">Enviar</button>
            </form>

            <h3>Endereço</h3>
            <p>Barão de Campinas, 537 - Centro, Limeira - SP, 13480-211 - Limeira, SP</p>

            <h3>Horários de Funcionamento</h3>
            <p>
                Segunda a Sexta: 7:30h - 18h <br>
                Sábado: 7:30h - 14h <br>
                Domingo: Fechado
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Café da Tuca - Todos os direitos reservados.</p>
    </footer>
</body>
</html>

    <script>
        function checkLogin(event) {
            event.preventDefault(); // Previne o comportamento padrão do link
            alert("É necessário realizar o login para acessar o cardápio."); // Alerta ao usuário
            window.location.href = "index.php"; // Redireciona para a página inicial
        }
    </script>
</body>
</html>
