<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Rotas de Ciclismo</title>
    <link rel="stylesheet" href="estilos/rotas.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script defer src="scripts/mapBox.js"></script>
</head>
<body>
    <header class="cabecalho">
        <div class="logo">
            <img src="imagens/novologo.png" alt="Logo da Aplicação">
        </div>
        <nav class="navegacao">
            <ul>
                <li><a href="pag_inical.php">Home</a></li>
                <li><a href="editarPerfil.php">Perfil</a></li>
                <li><a href="indexAtividades.php">Atividades</a></li>
            </ul>
            <form action="logica/logica_usuario.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span><?php echo $_SESSION['nome']; ?></span>
            </div>
        </nav>
    </header>
    <section class="conteudo">
        <aside class="barra-lateral">
            <h2>Pesquisar Rotas de Ciclismo</h2>
            <form id="form-pesquisa">
                <p><label for="origem">Origem:</label><input type="text" id="origem" name="origem" required></p>
                <p><label for="destino">Destino:</label><input type="text" id="destino" name="destino" required></p>
                <p><button type="submit">Buscar Rota</button></p>
            </form>
            <div id="resultados">
                <h3>Resultados</h3>
                <p id="distancia"></p>
                <p id="tempo"></p>
            </div>
        </aside>
        <div id="mapa"></div>
    </section>
    <footer class="footer">
        <div class="links-footer">
            <a href="#" class="link-footer">Termos de Uso</a>
            <a href="#" class="link-footer">Privacidade</a>
            <a href="#" class="link-footer">Contato</a>
        </div>
        <div class="store-icons">
            <img src="imagens/playstore.png" alt="Google Play" class="icone-store">
            <img src="imagens/appstore.png" alt="App Store" class="icone-store">
        </div>
        <p>&copy; 2024 Aplicação de Rotas de Ciclismo. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
