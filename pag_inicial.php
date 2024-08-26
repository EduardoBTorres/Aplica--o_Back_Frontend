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
                <li><a href="indexAtividades.php">Atividades</a></li>
                <li><a href="editarPerfil.php">Perfil</a></li>
                <li><a href="indexAtividades.php">Rotas</a></li>
            </ul>
            <form action="logica/logica_usuario.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span><?php echo $_SESSION['nome']; ?></span>
            </div>
        </nav>
    </header>

    <img src="imagens/telainicial.jpg" alt="Banner" class="banner">

    <main>
        <section class="container">
            <h1 class="titulo">Bem-vindo, <?php echo $_SESSION['nome']; ?></h1>
            <p class="texto-principal">
                O BikeTracker é um aplicativo de gerenciamento e registro de atividades de ciclismo.
                Com ele será possível monitorar e registrar uma simples pedalada que você pratica no
                dia a dia a uma atividade profissional de ciclismo, esse app vai ser seu companheiro
                diário que irá auxiliar no seu desempenho físico e atlético.
            </p>

            <div class="imagens-container">
                <div class="imagem-item">
                    <p class="texto-imagem">MAPAS</p>
                    <img src="imagens/mapas.jpeg" alt="Gráfico">
                </div>
                <div class="imagem-item">
                    <p class="texto-imagem">COMEÇAR ATIVIDADE</p>
                    <img src="imagens/iniciarPedalada.jpeg" alt="Bike">
                </div>
                <div class="imagem-item">
                    <p class="texto-imagem">PROGRESSO</p>
                    <img src="imagens/progresso.jpeg" alt="Mapa">
                </div>
            </div>

            <p class="texto-secundario">
                Explore o mundo do ciclismo bem acompanhado com informações
                detalhadas de seu desempenho físico, comparados a metas que você mesmo definiu,
                além disso a aplicação também conta com uma aba, onde será possível criar planos de
                atividades personalizados para alcançar determinados objetivos de acordo com seu perfil.
            </p> <br></br>
            <button id="toggle-info" class="btn-toggle-info">Mostrar Informações Adicionais</button>
        </section>

        <aside class="informacoes-adicionais" id="info-adicionais">
            <h2 class="titulo-aside">TECNOLOGIA ALIADA AO ESPORTE</h2>
            <p>O BikeTracker conta com tecnologias utilizando recursos de geolocalização do seu dispositivo.
                Através dessas ferramentas, o app consegue acessar informações relacionadas a clima, temperatura,
                velocidade de pedalada e diversos outros recursos que irão auxiliar na sua utilização.</p>

            <p>Além disso, o aplicativo oferece:</p>
            <ul>
                <li><strong>Monitoramento em Tempo Real:</strong> Acompanhe seu desempenho e estatísticas em tempo real enquanto pedala.</li>
                <li><strong>Mapas Detalhados:</strong> Explore rotas e trilhas com mapas detalhados e sugestões de trajetos.</li>
                <li><strong>Alertas Personalizados:</strong> Receba notificações sobre condições climáticas adversas e metas alcançadas.</li>
                <li><strong>Análise de Desempenho:</strong> Obtenha relatórios detalhados sobre seu desempenho físico e evolução ao longo do tempo.</li>
                <li><strong>Integração com Dispositivos:</strong> Sincronize o app com dispositivos de monitoramento e sensores de ciclismo.</li>
            </ul>

            <p>Essas funcionalidades foram desenvolvidas para garantir que você tenha a melhor experiência e maximize
                seus treinos, mantendo-se sempre informado e preparado para qualquer desafio.</p>
        </aside>

    </main>

    <main>
        <section class="carousel-container">
            <button class="carousel-nav prev" onclick="mudarSlide(-1)">&#10094;</button>
            <div class="carousel">
                <div class="carousel-item">
                    <h2 class="carousel-title">Circuito Cascatas e Montanhas</h2>
                    <p class="carousel-text">Ao longo dos seus 123 km, cicloturistas vivenciam
                        experiências de contato com a natureza e com ambiente predominantemente colonial.
                        Diversas cachoeiras, como a Cascata do Chuvisqueiro e o Parque das Oito Cachoeiras,
                        prometem encher os olhos do visitante ao longo do caminho, assim como cultura, histórica
                        e gastronomia típica. Dividido em quatro estapas, o circuito passa pelos municípios
                        de Rolante, Riozinho e São Francisco de Paula e pode ser percorrido de dois a cinco dias,
                        de acordo com o tempo e preparo de cada ciclista. </p>
                    <p>Partida/Chegada: Rolante (RS)</p>
                    <p>Percurso total: 123 km</p>
                    <p>Altimetria acumulada: 3.100 metros</p>
                    <p>Entidade gestora: Associação dos Amigos do Circuito Cascatas e Montanhas – AMICAM</p>
                    <p>Site: http://cascatasemontanhas.com.br/</p>

                    <img src="imagens/carousel1.jpg" alt="Imagem 1 do Carrossel">
                </div>
                <div class="carousel-item">
                    <h2 class="carousel-title">Título 2</h2>
                    <p class="carousel-text">Texto para a segunda imagem do carrossel.</p>
                    <img src="imagens/carousel2.jpg" alt="Imagem 2 do Carrossel">
                </div>
                <!-- Adicione mais itens conforme necessário -->
            </div>
            <button class="carousel-nav next" onclick="mudarSlide(1)">&#10095;</button>
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