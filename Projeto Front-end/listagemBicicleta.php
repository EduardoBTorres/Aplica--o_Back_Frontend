<?php
session_start();
require_once('logica/bicicletaDAO.php');

$codUsuario = $_SESSION['codUsuario'];
$bicicletasDAO = new BicicletaDAO();
$bicicletas = $bicicletasDAO->buscarBicicletaPorUsuario($codUsuario);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Listagem Bicicletas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="estilos/bicicletas.css">
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

    <main>
        <?php
        // Verifica se há bicicletas cadastradas
        if (empty($bicicletas)) {
        ?>
            <section>
                <p>Não há bicicletas cadastradas.</p>
            </section>
            <?php
        } else {
            echo "<h2>Suas bicicletas:</h2>";
            echo "<div class='grid-container'>";

            foreach ($bicicletas as $bicicleta => $value) {
            ?>
                <div class="grid-item">
                    <p>Marca: <?php echo htmlspecialchars($value['marca']); ?></p>
                    <p>Modelo: <?php echo htmlspecialchars($value['modelo']); ?></p>
                    <p>Aro: <?php echo htmlspecialchars($value['aro']); ?></p>
                    <p>Cor: <?php echo htmlspecialchars($value['cor']); ?></p>
                    <!-- Botão de Edição -->
                    <a href="editarBicicleta.php">
                        <button class="btn-editar">Editar</button>
                    </a>
                    <a href="excluirBicicleta.php">
                        <button class="btn-editar">Excluir</button>
                    </a>
                </div>
        <?php
            }


            echo "</div>"; // Fecha a div.grid-container
        }
        ?>
    </main>

    <section class="registrar-atividade-section" 1>
        <div class="container">
            <p class="registrar-text">Pronto para adicionar sua próxima aventura? Cadastre uma nova bicicleta agora mesmo e comece a pedalar por ai!</p>
            <a href="cadastroBicicleta.php">
                <button class="btn-cadastrar">Registrar Bicicleta</button>
            </a>
        </div>
    </section>

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