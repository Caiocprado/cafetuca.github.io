<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="cardapio.css">
    <title>Cardápio - Café da Tuca</title>
</head>
<body>
    <div class="mp">
        <img src="assets/logo.png" alt="Logo" class="logo">
        
        <div class="nav-container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cardapio.php">Cardápio</a></li>
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

    <main>
        <!-- Barra de Pesquisa -->
        <div class="divSearch">
            <label for="search"></label>
            <div class="search-container">
                <input type="search" id="search" placeholder="Digite sua busca...">
                <img src="assets/lupa.png" alt="Buscar" class="search-icon">
            </div>
        </div> 
    </main>
    
    <script src="javascript.js"></script>
    <script>
        const content = document.querySelector(".content");
        const inputSearch = document.querySelector("input[type='search']");

        let items = [];

        inputSearch.oninput = () => {
            content.innerHTML = "";

            items
                .filter((item) =>
                    item.toLowerCase().includes(inputSearch.value.toLowerCase())
                )
                .forEach((item) => addHTML(item));  
        };

        function addHTML(item) {
            const div = document.createElement("div");
            div.innerHTML = item;
            content.append(div);
        }

        fetch("https://jsonplaceholder.typicode.com/users")
            .then((data) => data.json())
            .then((users) => {
                users.forEach((user) => {
                    addHTML(user.name);
                    items.push(user.name);
                });
            });
    </script>

    <ul class="listaCardapio">
        <li><img src="assets/croisant.jpeg" alt="croisant">Croisant<br>Valor: R$9,50</li>
        <li><img src="assets/paoQueijo.jpeg" alt="Pão de Queijo Parmesão">Pão de Queijo c/Parmesão<br>Valor: R$4,50</li>
        <li><img src="assets/paoQueijoNormal.jpeg" alt="Pão de Queijo">Pão Queijo<br>Valor: R$4,50</li>
        <li><img src="assets/coisant2.jpeg" alt="Croisant de chocolate">Croisant de chocolate<br>Valor: R$9,50</li>
        <li><img src="assets/trouxinhaFrango.jpeg" alt="Trouxinha de Frango">Trouxinha de Frango<br>Valor: R$7,50</li>
        <li><img src="assets/enroladoCarne.jpeg" alt="Enrolado de Carne">Enrolado de Carne<br>Valor: R$8,00</li>
        <li><img src="assets/enroladoFrango.jpeg" alt="Enrolado de Frango">Enrolado de Frango<br>Valor: R$8,00</li>
        <li><img src="assets/enroladoPresuntoQueijo.jpeg" alt="Enrolado de Presunto e Queijo">Enrolado de Presunto e Queijo<br>Valor: R$8,00</li>
        <li><img src="assets/hamburguer.jpeg" alt="Hamburguer">Hamburguer<br>Valor: R$8,00</li>
        <li><img src="assets/paoBatata.jpeg" alt="Pão de Batata">Pão de Batata<br>Valor: R$4,50</li>
    </ul>
</body>
</html>
