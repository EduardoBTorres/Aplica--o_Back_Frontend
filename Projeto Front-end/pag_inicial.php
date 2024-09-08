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
                <li><a href="listagemBicicleta.php">Bicicletas</a></li>
                <li><a href="rotas.php">Rotas</a></li>
                <li><a href="editarPerfil.php">Perfil</a></li>
            </ul>
            <form action="logica/logica_usuario.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span>Bem vindo <?php echo $_SESSION['nome']; ?></span>
            </div>
        </nav>
    </header>

    <!-- Banner -->
    <div class="banner-container">
        <img src="imagens/telainicial.jpg" alt="Banner" class="banner">
        <div class="banner-text">BikeTracker: O seu aplicativo de ciclismo</div>
    </div>


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
                    <p class="texto-imagem">
                    <h2>MAPAS</h2>
                    </p>
                    <img src="imagens/mapas.jpeg" alt="Gráfico">
                </div>
                <div class="imagem-item">
                    <p class="texto-imagem">
                    <h2>ATIVIDADE</h2>
                    </p>
                    <img src="imagens/iniciarPedalada.jpeg" alt="Bike">
                </div>
                <div class="imagem-item">
                    <p class="texto-imagem">
                    <h2>PROGRESSO</h2>
                    </p>
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
                <strong>Monitoramento em Tempo Real:</strong> 
                <p>Acompanhe seu desempenho e estatísticas em tempo real enquanto pedala.</p>
                <strong>Mapas Detalhados:</strong> Explore rotas e trilhas com mapas detalhados e sugestões de trajetos.</p>
                <p><strong>Alertas Personalizados:</strong> Receba notificações sobre condições climáticas adversas e metas alcançadas.</p>
                <p><strong>Análise de Desempenho:</strong> Obtenha relatórios detalhados sobre seu desempenho físico e evolução ao longo do tempo.</p>
                <p><strong>Integração com Dispositivos:</strong> Sincronize o app com dispositivos de monitoramento e sensores de ciclismo.</p>
            </ul>
            <p>Essas funcionalidades foram desenvolvidas para garantir que você tenha a melhor experiência e maximize
                seus treinos, mantendo-se sempre informado e preparado para qualquer desafio.</p>

           <h3>Por que escolher o BikeTracker?</h3>
           <ul>
                <p><strong>Intuitivo e fácil de usar:</strong> Interface amigável e design moderno para que você possa se concentrar no que realmente importa: pedalar.</p>
                <p><strong>Personalizado para você:</strong> Adapte o aplicativo às suas necessidades e preferências, escolhendo quais dados visualizar e quais alertas receber</p>
                <p><strong>Seguro e confiável:</strong>Proteja seus dados com as mais recentes tecnologias de segurança e desfrute de uma experiência sem interrupções.</p>
           </ul>
        </aside>

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