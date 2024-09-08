<?php
session_start();
require_once('logica/Atividades.php');
require_once('logica/AtividadesDAO.php'); 
require_once('logica/Usuario.php');
require_once('logica/UsuarioDAO.php');

# Verifica se a atividade a ser editada foi informada
$retorno = null; // Inicializa a variável $retorno
if (isset($_GET['codAtividades'])) {
    $codAtividades = $_GET['codAtividades']; // Obtém o código da atividade via GET
    $atividadesDAO = new AtividadesDAO();
    $retorno = $atividadesDAO->buscarAtividadePorId($codAtividades); // Busca a atividade pelo ID
}

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
        <?php if ($retorno): ?>
        <form action="logica/logica_atividades.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
            <p><label for="titulo">Título: </label><input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($retorno['titulo']); ?>"></p>
            <p><label for="local">Local: </label><input type="text" name="local" id="local" value="<?php echo htmlspecialchars($retorno['local']); ?>"></p>
            <p><label for="distancia">Distância: </label><input type="number" name="distancia" id="distancia" value="<?php echo htmlspecialchars($retorno['distancia']); ?>"></p>
            <p><label for="tempo">Tempo: </label><input type="number" name="tempo" id="tempo" value="<?php echo htmlspecialchars($retorno['tempo']); ?>"></p>
            <p><label for="data">Data:</label><input type="date" name="data" id="data" value="<?php echo htmlspecialchars($retorno['data']); ?>"></p>
            <p><label for="descricao">Descrição:</label><input type="text" name="descricao" id="descricao" value="<?php echo htmlspecialchars($retorno['descricao']); ?>"></p>
            <input type="hidden" name="codAtividades" value="<?php echo htmlspecialchars($retorno['codAtividades']); ?>">
            <p><input type="submit" name="editar" value="Editar"></p>
        </form>
        <?php else: ?>
            <p>Atividade não encontrada.</p>
        <?php endif; ?>
    </section>

    <?php if ($retorno): ?>
    <section class="container-form">
        <h3>Excluir Atividade</h3>
        <form action="logica/logica_atividades.php" method="post" onsubmit="return confirma_excluir()">
            <input type="hidden" name="codAtividades" value="<?php echo htmlspecialchars($retorno['codAtividades']); ?>">
            <button type="submit" name="deletar">Deletar</button>
        </form>
    </section>
    <?php endif; ?>
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
