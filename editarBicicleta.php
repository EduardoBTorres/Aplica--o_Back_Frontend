<?php
session_start();
require_once('logica/bicicletaDAO.php');

$codUsuario = $_SESSION['codUsuario'];
$bicicletasDAO = new BicicletaDAO();
$bicicletas = $bicicletasDAO->buscarBicicletaPorUsuario($codUsuario);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
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
            <form action="logica/logica_bicicleta.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span>Bem vindo <?php echo $_SESSION['nome']; ?></span>
            </div>
        </nav>
    </header>

    <main>
        <section class="container-form">
            <h3>Editar Bicicleta</h3>
            <div>
                <?php

                // Verifica se há atividades cadastradas
                if (empty($bicicletas)) {
                ?>
                    <section>
                        <p>Não há atividades cadastradas.</p>
                    </section>
                    <?php
                } else {
                    echo "<div class='grid-container'>";

                    foreach ($bicicletas as $bicicletas => $value) {
                    ?>
                        <form action="logica/logica_bicicleta.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                            <p><label for="marca">Marca:</label>
                                <input type="text" name="marca" id="marca" value="<?php echo htmlspecialchars($value['marca']); ?>">
                            </p>

                            <p><label for="modelo">Modelo:</label>
                                <input type="text" name="modelo" id="modelo" value="<?php echo htmlspecialchars($value['modelo']); ?>">
                            </p>

                            <p><label for="aro">Aro:</label>
                                <input type="number" name="aro" id="aro" value="<?php echo htmlspecialchars($value['aro']); ?>">
                            </p>

                            <p><label for="cor">Cor:</label>
                                <input type="text" name="cor" id="cor" value="<?php echo htmlspecialchars($value['cor']); ?>">
                            </p>

                            <input type="hidden" name="codBicicleta" value="<?php echo htmlspecialchars($value['codBicicleta']); ?>">
                            <p><input type="submit" name="editar" value="Editar"></p>

                            <input type="hidden" id="codBicicleta" name="codBicicleta" value="<?php echo htmlspecialchars($value['codBicicleta']); ?>">
                            <button id="botaoExcluir" type="submit" name="deletar">Deletar</button>
                        </form>

                    <?php } ?>
                <?php } ?>
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