<?php
require_once('logica/logica_atividades.php');
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
    <title>Cadastro de atividades</title>
    <link rel="stylesheet" href="estilos/form_atividades.css">
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
                <li><a href="pag_inicial.php">Home</a></li>
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

    <section class="conteudo">
        <div class="imagem-banner"></div>
        <div class="container-form">
            <h3>Registrar Bicicleta</h3>
            <form action="logica/logica_bicicleta.php" method="post" enctype="multipart/form-data" class="form-cadastro" onsubmit="mostrarMensagemSucesso()">
                <label for="marca" class="label">Marca</label>
                <input type="text" id="marca" name="marca" class="input" required>

                <label for="modelo" class="label">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="input" required>

                <label for="aro" class="label">Aro</label>
                <input type="number" id="aro" name="aro" class="input" required>

                <label for="cor" class="label">Cor</label>
                <input type="text" id="cor" name="cor" class="input" required> <br></br>


                <button type="submit" id='cadastrar' name="cadastrar" value="Cadastrar" class="botao-submit">Registrar</button><br></br>
            </form>
            <div class="container">
                <a href="formAtividades.php">
                    <button class="botao-submit">Cadastrar Atividade</button>
                </a>
            </div>
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