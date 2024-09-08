<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado']) {
    header('Location: pag_inicial.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="scripts/validacaoLogin.js" defer></script>
</head>
<body>
    <div class="container">
        <header class="cabecalho">
            <div class="logo">
                <img src="imagens/novologo.png" alt="Logo da Aplicação">
            </div>
        </header>

        <h1 class="titulo">FAZER LOGIN</h1>

        <!-- Div para exibir mensagens de erro -->
        <div id="mensagemErro" class="mensagem-erro"></div>

        <form action="logica/logica_usuario.php" method="post" class="form-login" onsubmit="return validarLogin()">
            <label for="email" class="label">Email:</label>
            <input type="email" id="email" name="email" class="input" required>
            <label for="senha" class="label">Senha:</label>
            <input type="password" id="senha" name="senha" class="input" required>
            <button type="submit" id='entrar' name='entrar' class="botao-submit">Entrar</button>
        </form>
        <p class="cadastro">Não tem uma conta? <a href="cadastro.php" class="botao-cadastro">Cadastre-se aqui</a></p>
    </div>


    <script>
        // Evento JavaScript para adicionar dinamismo
        document.querySelector('.botao-submit').addEventListener('mouseover', function() {
            this.style.backgroundColor = '#4caf50'; // Verde escuro quando o botão é sobrevoado
        });

        document.querySelector('.botao-submit').addEventListener('mouseout', function() {
            this.style.backgroundColor = '#66bb6a'; // Retorna ao verde médio original
        });
    </script>
</body>
</html>
