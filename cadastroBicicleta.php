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

        <h1 class="titulo">REGISTRAR BIKE</h1>
        <form action="logica/logica_bicicleta.php" method="post" enctype="multipart/form-data" class="form-cadastro" onsubmit="mostrarMensagemSucesso()">
            <label for="marca" class="label">Marca</label>
            <input type="text" id="marca" name="marca" class="input" required>

            <label for="modelo" class="label">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="input" required>

            <label for="aro" class="label">Aro</label>
            <input type="number" id="aro" name="aro" class="input" required>

            <button type="submit" id='cadastrar' name="cadastrar" value="Cadastrar" class="botao-submit">Registrar</button>
        </form>
    </div>
</body>
</html>