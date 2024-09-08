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
                <li><a href="indexAtividades.php">Atividades</a></li>
                <li><a href="editarPerfil.php">Perfil</a></li>
                <li><a href="rotas.php">Rotas</a></li>
                <li><a href="cadastroBicicleta.php">Registrar bike</a></li>
                <li><a href="listagemBicicleta.php">Bicicletas</a></li>
            </ul>
            <form action="logica/logica_usuario.php" method="post">
                <input type="submit" class="btn-sair" name="sair" value="Sair">
            </form>
            <div class="user-info">
                <span><?php echo $_SESSION['nome']; ?></span>
            </div>
        </nav>
    </header>

    <section class="conteudo">
        <div class="imagem-banner"></div>
        <div class="container-form">
            <h3>Cadastrar Atividade</h3>
            <form action="logica/logica_atividades.php" method="post" enctype="multipart/form-data">
                <p><label for="titulo">Título: </label><input type="text" name="titulo" id="titulo" required></p>
                <p><label for="local">Local: </label><input type="text" name="local" id="local" required></p>
                <p><label for="distancia">Distância (km): </label><input type="number" name="distancia" id="distancia" required></p>
                <p><label for="tempo">Tempo (min): </label><input type="number" name="tempo" id="tempo" required></p>
                <p><label for="data">Data:</label><input type="date" name="data" id="data" required></p>
                <p><label for="descricao">Descrição:</label><input type="text" name="descricao" id="descricao" required></p>
                <p><label for="codBicicleta">Escolha uma bicicleta</label> <select name="codBicicleta">
                        <?php foreach ($bicicletas as $bicicleta => $value) {
                        ?>
                            <option value="<?php echo $value['codBicicleta']; ?>"><?php echo $value['modelo']; ?></option>

                        <?php  } ?>
                    </select>
                <p><input type="submit" id='cadastrar' name='cadastrar' value="Cadastrar"></p>
            </form>
        </div>
    </section>

</body>

</html>