<?php
require_once('logica/BicicletaDAO.php'); 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Pet&Health</title>
</head>
<body>

<main>
    <?php
        // Cria uma instância da classe BicicletaDAO
        $bicicletasDAO = new BicicletaDAO();

        // Chama a função listarBicicleta e armazena o resultado em uma variável
        $bicicletas = $bicicletasDAO->listarBicicleta();

        // Verifica se há bicicletas cadastradas
        if(empty($bicicletas)){
            ?>
                <section>
                    <p>Não há bicicletas cadastradas.</p>
                </section>
            <?php
        } else {
            // Itera sobre as bicicletas e exibe as informações
            foreach($bicicletas as $bicicleta){
                ?>
                <section>
                    <h2>Listagem de bicicletas:</h2>
                    <p>Marca: <?php echo htmlspecialchars($bicicleta['marca']); ?></p>
                    <p>Modelo: <?php echo htmlspecialchars($bicicleta['modelo']); ?></p>
                    <p>Aro: <?php echo htmlspecialchars($bicicleta['aro']); ?></p>    
                </section>
                <?php
            }
        }
    ?>
</main>
</body>
</html>
