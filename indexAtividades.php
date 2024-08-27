<!DOCTYPE html>
<html lang="pt-BR">

<?php
require_once('logica/AtividadesDAO.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades de Ciclismo - Biketracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
        }

        .content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #2ecc71;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>

    <main>
        <h2>Listagem de atividades</h2>
        <?php
        $atividadesDAO = new AtividadesDAO();
        $atividadesList = $atividadesDAO->listarAtividades();
        
        if (empty($atividadesList)) {
        ?>
            <section>
                <p>Não há atividades cadastradas.</p>
            </section>
        <?php
        } else {
            foreach ($atividadesList as $atividade) {
        ?>
            <section>
                <h3>Atividade:</h3>
                <p>Título: <?php echo htmlspecialchars($atividade['titulo']); ?></p>
                <p>Local: <?php echo htmlspecialchars($atividade['local']); ?></p>
                <p>Distância: <?php echo htmlspecialchars($atividade['distancia']); ?> km</p>
                <p>Tempo: <?php echo htmlspecialchars($atividade['tempo']); ?> minutos</p>
                <p>Data: <?php echo htmlspecialchars($atividade['data']); ?></p>
                <p>Descrição: <?php echo htmlspecialchars($atividade['descricao']); ?></p>
            </section>
        <?php
            }
        }
        ?>
    </main>

    <main>  

        <h2>Registrar atividade</h2>
        <div class="content">
            <h1>Atividades de Ciclismo e o Aplicativo Biketracker</h1>

            <p>O ciclismo é uma atividade física extremamente benéfica para a saúde, que não só melhora a resistência cardiovascular como também fortalece os músculos, promove a perda de peso, e aumenta a resistência física. Além disso, pedalar regularmente pode ajudar a reduzir o estresse e a ansiedade, proporcionando uma sensação de bem-estar e clareza mental. Quando combinado com uma alimentação balanceada, o ciclismo é uma ferramenta poderosa na manutenção de um estilo de vida saudável.</p>

            <p>O Biketracker é um aplicativo desenvolvido para ajudar ciclistas a monitorar suas atividades de maneira eficiente e precisa. Ele oferece uma série de recursos que permitem aos usuários rastrear suas rotas, medir a distância percorrida, calcular o tempo de atividade, e até mesmo comparar os resultados ao longo do tempo. Além disso, o Biketracker fornece informações sobre as condições climáticas e a altimetria das rotas, permitindo um planejamento mais seguro e eficaz das atividades ciclísticas.</p>

            <form action="logica/logica_atividades.php" method="post" enctype="multipart/form-data" onsubmit="mostrarMensagemSucesso()">
                <label for="titulo">Título da Atividade</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="local">Local Desejado</label>
                <input type="text" id="local" name="local" required>

                <label for="distancia">Distância a ser Percorrida (km)</label>
                <input type="number" id="distancia" name="distancia" required>

                <label for="tempo">Tempo de Atividade (minutos)</label>
                <input type="number" id="tempo" name="tempo" required>

                <label for="data">Data</label>
                <input type="date" id="data" name="data" required>

                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>

                <button type="submit">Cadastrar Atividade</button>
            </form>
        </div>
        <a href="listagemBicicleta.php">Registrar Bike</a>
    </main>

    <script>
        function mostrarMensagemSucesso() {
            alert('Cadastro realizado com sucesso!');
        }
    </script>
</body>

</html>
