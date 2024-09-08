<!DOCTYPE html>
<html lang="pt-BR">

<?php
session_start();
require_once('logica/AtividadesDAO.php');
require_once('logica/atividades.php');
require_once('logica/Usuario.php');
require_once('logica/UsuarioDAO.php');

$codUsuario = $_SESSION['codUsuario'];
$atividadesDAO = new AtividadesDAO();
$atividades = $atividadesDAO->listarAtividades($codUsuario);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades de Ciclismo - Biketracker</title>
    <link rel="stylesheet" href="estilos/atividades.css">
    <link rel="stylesheet" href="estilos/editarPerfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header class="cabecalho">
        <div class="logo">
            <img src="imagens/novologo.png" alt="Logo da Aplicação">
        </div>
        <nav class="navegacao">
            <ul>
                <li><a href="pag_inicial.php">Home</a></li>
                <li><a href="editarPerfil.php">Perfil</a></li>
                <li><a href="rotas.php">Rotas</a></li>
            </ul>
            <form action="logica/logica_usuario.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span><?php echo htmlspecialchars($_SESSION['nome']); ?></span>
            </div>
        </nav>
    </header>

    <!-- Banner -->
    <div class="banner-container">
        <img src="imagens/fundo_login.jpg" alt="Banner" class="banner">
        <div class="banner-text">Sinta a energia de uma pedalada: mova-se com BikeTracker!</div>
    </div>

    <main>
        <section class="intro-section">
            <div class="container">
                <h1 class="titulo">Registro de Atividades</h1>
                <p class="texto-principal">
                    O BikeTracker é um aplicativo de gerenciamento e registro de atividades de ciclismo.
                    Com ele, é possível monitorar e registrar desde uma simples pedalada diária até atividades
                    profissionais de alta performance. Acompanhe seu desempenho, descubra novas rotas e compartilhe
                    suas conquistas com amigos e a comunidade.
                </p>
            </div>
        </section>

        <div class="imagem-sobreposta-container">
            <img src="imagens/ciclista.jpg" alt="Imagem de Ciclismo" class="imagem-sobreposta">
            <div class="texto-sobreposto">Explore o Mundo Sobre Duas Rodas! Desfrute de momentos únicos e viva experiências incríveis com sua bike.</div>
        </div>

        <section class="atividades-section">
            <div class="container">
                <h2 class="section-title">Minhas Atividades</h2>
                <div id="listagem">
                <?php
    
    // Verifica se há atividades cadastradas
    if(empty($atividades)){
        ?>
            <section>
                <p>Não há atividades cadastradas.</p>
            </section>
        <?php
    } else {

    
         echo "<h2>Listagem de Atividades:</h2>";
    
        foreach($atividades as $atividade=>$value){
            ?>
                <p>Título: <?php echo htmlspecialchars($value['titulo']); ?></p>
                <p>Local: <?php echo htmlspecialchars($value['local']); ?></p>
                <p>Distância: <?php echo htmlspecialchars($value['distancia']); ?></p>
                <p>Tempo: <?php echo htmlspecialchars($value['tempo']); ?></p>
                <p>Data: <?php echo htmlspecialchars($value['data']); ?></p>
                <p>Descrição: <?php echo htmlspecialchars($value['descricao']); ?></p>
                <p>Marca: <?php echo htmlspecialchars($value['cor']); ?></p> 
                <p>Modelo: <?php echo htmlspecialchars($value['modelo']); ?></p>
                <p>Aro: <?php echo htmlspecialchars($value['aro']); ?></p>  
                <p>Cor: <?php echo htmlspecialchars($value['cor']); ?></p>

                <?php } ?>

                <h2>Listagem de Bicicletas:</h2>
            <?php
        foreach($atividades as $atividade=>$value){
            ?>
                <p>Marca: <?php echo htmlspecialchars($value['marca']); ?></p> 
                <p>Modelo: <?php echo htmlspecialchars($value['modelo']); ?></p>
                <p>Aro: <?php echo htmlspecialchars($value['aro']); ?></p>  
                <p>Cor: <?php echo htmlspecialchars($value['cor']); ?></p>
                <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php } ?>

        <section class="registrar-atividade-section"1>
            <div class="container">
                <p class="registrar-text">Pronto para adicionar sua próxima aventura? Cadastre uma nova atividade agora mesmo e comece a monitorar seu desempenho.</p>
                <a href="cadastroBicicleta.php">
                    <button class="btn-cadastrar">Cadastrar Atividade</button>
                </a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="links-footer">
            <a href="#" class="link-footer">Sobre Nós</a>
            <a href="#" class="link-footer">Contato</a>
        </div>
        <div class="store-icons">
            <img src="imagens/playstore.png" alt="Play Store" class="icone-store">
            <img src="imagens/appstore.png" alt="Apple Store" class="icone-store">
        </div>
        <p class="copyright">&copy; 2024 BikeTracker. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
