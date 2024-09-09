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
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atividade</title>
    <link rel="stylesheet" href="estilos/editarPerfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <script src="scripts/validacaoEdicao.js" defer></script>
</head>

<body>
    <header class="cabecalho">
        <div class="logo">
            <img src="imagens/novologo.png" alt="Logo da Aplicação">
        </div>
        <nav class="navegacao">
            <ul>
                <li><a href="pag_inicial.php">Home</a></li>
                <li><a href="indexAtividades.php">Atividades</a></li>
                <li><a href="listagemBicicleta.php">Bicicletas</a></li>
                <li><a href="rotas.php">Rotas</a></li>
                <li><a href="editarPerfil.php">Editar Perfil</a></li>
            </ul>
            <form action="logica/logica_atividades.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span>Bem vindo <?php echo $_SESSION['nome']; ?></span>
            </div>
        </nav>
    </header>

    <main>
        <section class="container-form">
            <h3>Editar Atividade</h3>
            <div>
                <?php
                // Verifica se há atividades cadastradas
                if (empty($atividades)) {
                ?>
                    <section>
                        <p>Não há atividades cadastradas.</p>
                    </section>
                    <?php
                } else {
                    echo "<div class='grid-container'>";
                    foreach ($atividades as $value) { // Usando $value diretamente para cada atividade
                    ?>
                        <form action="logica/logica_atividades.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                            <p><label for="titulo">Título: </label><input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($value['titulo']); ?>"></p>
                            <p><label for="local">Local: </label><input type="text" name="local" id="local" value="<?php echo htmlspecialchars($value['local']); ?>"></p>
                            <p><label for="distancia">Distância: </label><input type="number" name="distancia" id="distancia" value="<?php echo htmlspecialchars($value['distancia']); ?>"></p>
                            <p><label for="tempo">Tempo: </label><input type="number" name="tempo" id="tempo" value="<?php echo htmlspecialchars($value['tempo']); ?>"></p>
                            <p><label for="data">Data:</label><input type="date" name="data" id="data" value="<?php echo htmlspecialchars($value['data']); ?>"></p>
                            <p><label for="descricao">Descrição:</label><input type="text" name="descricao" id="descricao" value="<?php echo htmlspecialchars($value['descricao']); ?>"></p>

                            <input type="hidden" name="codAtividades" value="<?php echo htmlspecialchars($value['codAtividades']); ?>">
                            <p><input type="submit" name="editar" value="Editar"></p>
                            <button type="submit" name="deletar">Deletar</button>

                        </form>
                <?php
                    }
                    echo "</div>";
                }
                ?>
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