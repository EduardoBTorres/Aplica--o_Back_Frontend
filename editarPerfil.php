<?php
session_start();
 require_once('logica/Usuario.php');
 require_once('logica/UsuarioDAO.php'); 

 $codUsuario = $_SESSION['codUsuario'];

 $usuario=new Usuario();
 $usuario->setcodUsuario($codUsuario);
 $usuariosDAO = new UsuarioDAO();
 $retorno = $usuariosDAO->buscarUsuario($usuario);

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
                <li><a href="rotas.php">Rotas</a></li>
            </ul>
            <form action="logica/logica_usuario.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
            <span><?php echo $_SESSION['nome']; ?></span>  
            </div>
        </nav>
    </header>

    <main>
        <section class="container-form">
            <h3>Editar Perfil</h3>
            <form action="logica/logica_usuario.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($retorno['nome']); ?>"></p>
                <p><label for="email">Email: </label><input type="email" name="email" id="email" value="<?php echo htmlspecialchars($retorno['email']); ?>"></p>
                <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf" value="<?php echo htmlspecialchars($retorno['cpf']); ?>"></p>
                <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" value="<?php echo htmlspecialchars($retorno['senha']); ?>"></p>
                <p><label for="imagem">Imagem:</label><input type="file" name="imagem" id="imagem"></p>
                <input type="hidden" id='codUsuario' name='codUsuario' value="<?php echo htmlspecialchars($retorno['codUsuario']); ?>">
                <p><input type="submit" id='editar' name='editar' value="Editar"></p>
            </form>
        </section>

        <section class="container-form">
            <h3>Excluir Conta</h3>
            <form action="logica/logica_usuario.php" method="post" onsubmit="return confirma_excluir()">
                <input type="hidden" id="codUsuario" name="codUsuario" value="<?php echo htmlspecialchars($retorno['codUsuario']); ?>">
                <button id="botaoExcluir"  type="submit" name="deletar" value="<?php echo htmlspecialchars($retorno['codUsuario']); ?>">Deletar</button>
            </form>
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
