<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilos/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <script>
        function mostrarMensagemSucesso() {
            alert('Cadastro realizado com sucesso!');
        }
    </script>
</head>
<body>
    <div class="container">
        <header class="cabecalho">
            <div class="logo">
                <img src="imagens/novologo.png" alt="Logo da Aplicação">
            </div>
        </header>

        <h1 class="titulo">FAZER CADASTRO</h1>
        <form action="logica/logica_usuario.php" method="post" enctype="multipart/form-data" class="form-cadastro" onsubmit="mostrarMensagemSucesso()">
            <label for="nome" class="label">Nome:</label>
            <input type="text" id="nome" name="nome" class="input" required>

            <label for="email" class="label">Email:</label>
            <input type="email" id="email" name="email" class="input" required>

            <label for="cpf" class="label">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="input" required>

            <label for="senha" class="label">Senha:</label>
            <input type="password" id="senha" name="senha" class="input" required>

            <label for="imagem" class="label">Imagem de Perfil:</label>
            <input type="file" id="imagem" name="imagem" class="input-file">

            <button type="submit" id='cadastrar' name="cadastrar" value="Cadastrar" class="botao-submit">Cadastrar</button>
        </form>

        <p class="login">Já tem uma conta? <a href="index.php" class="botao-login">Faça login aqui</a></p>
    </div>
</body>
</html>
