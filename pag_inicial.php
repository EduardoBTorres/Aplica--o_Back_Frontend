<?php
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="estilos/pag_inicial.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script defer src="scripts/pag_inicial.js"></script>
</head>
<body>
    <header class="cabecalho">
        <div class="logo">
            <img src="imagens/novologo.png" alt="Logo da Aplicação">
        </div>
        <nav class="navegacao">
            <ul>
                <li><a href="pag_inicial.php" class="menu-item">Início</a></li>
                <li><a href="editarPerfil.php" class="menu-item">Perfil</a></li>
                <li><a href="indexAtividades.php" class="menu-item">Atividades</a></li>
                <form action="logica/logica_usuario.php" method="post">
                    <input type="submit" class="menu-item btn-sair" name="sair" value="Sair">
                </form>
            </ul>
        </nav>
    </header>

    <img src="imagens/telainicial.jpg" alt="Banner" class="banner">

    <main>
        <section class="container">
            <h1 class="titulo">Bem-vindo, <?php echo $_SESSION['nome']; ?></h1>
            <p class="texto-principal">
                O Sports Health é um aplicativo de gerenciamento e registro de atividades de ciclismo. 
                Com ele será possível monitorar e registrar uma simples pedalada que você pratica no 
                dia a dia a uma atividade profissional de ciclismo, esse app vai ser seu companheiro 
                diário que irá auxiliar no seu desempenho físico e atlético.
            </p>

            <div class="imagens-container">
                <div class="imagem-item">
                    <p class="texto-imagem">Gráfico de Desempenho</p>
                    <img src="imagens/mapa.png" alt="Gráfico">
                </div>
                <div class="imagem-item">
                    <p class="texto-imagem">Uso da Bicicleta</p>
                    <img src="imagens/usebike.png" alt="Bike">
                </div>
                <div class="imagem-item">
                    <p class="texto-imagem">Mapa de Rotas</p>
                    <img src="imagens/mapa2.png" alt="Mapa">
                </div>
            </div>

            <p class="texto-secundario">
                Explore o mundo do ciclismo bem acompanhado com informações 
                detalhadas de seu desempenho físico, comparados a metas que você mesmo definiu, 
                além disso a aplicação também conta com uma aba, onde será possível criar planos de 
                atividades personalizados para alcançar determinados objetivos de acordo com seu perfil.
            </p>
            <button id="toggle-info" class="btn-toggle-info">Mostrar Informações Adicionais</button>
        </section>

        <aside class="informacoes-adicionais" id="info-adicionais">
            <h2 class="titulo-aside">Informações Adicionais</h2>
            <p>O Sports Health conta com tecnologias utilizando recursos de geolocalização do seu dispositivo, 
                através dessas ferramentas, o app consegue acessar informações relacionadas a clima, temperatura, 
                velocidade de pedalada e diversos outros recursos que irão auxiliar na sua utilização.
            </p>
        </aside>
    </main>

    <main>
        <section class="carousel-container">
        <div class="carousel">
            <button class="carousel-nav prev" onclick="mudarSlide(-1)">&#10094;</button>
                <div class="carousel-item">
                    <h2 class="carousel-title">Título 1</h2>
                    <p class="carousel-text">Texto para a primeira imagem do carrossel.</p>
                    <img src="imagens/carousel1.jpg" alt="Imagem 1 do Carrossel">
        </div>
        <div class="carousel-item">
            <h2 class="carousel-title">Título 2</h2>
            <p class="carousel-text">Texto para a segunda imagem do carrossel.</p>
            <img src="imagens/carousel2.jpg" alt="Imagem 2 do Carrossel">
        </div>
        <!-- Adicione mais itens conforme necessário -->
        <button class="carousel-nav next" onclick="mudarSlide(1)">&#10095;</button>
        </div>
        </section>
        
    </main>

    <footer class="footer">
        <div class="links-footer">
            <a href="sobre_nos.php" class="link-footer">Sobre Nós</a> |
            <a href="contatos.php" class="link-footer">Contatos</a>
        </div>
        <div class="store-icons">
            <img src="imagens/playstore.png" alt="Disponível na Play Store" class="icone-store">
            <img src="imagens/appstore.png" alt="Disponível na Apple Store" class="icone-store">
        </div>
        <div class="copyright">
            <p>&copy; 2024 BikeTracker. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
