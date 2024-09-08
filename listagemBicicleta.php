<?php
session_start();
require_once('logica/bicicletaDAO.php');

$codUsuario = $_SESSION['codUsuario'];
$bicicletasDAO = new BicicletaDAO();
$bicicletas = $bicicletasDAO->buscarBicicletaPorUsuario($codUsuario);
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
    
        // Verifica se há bicicletas cadastradas
        if(empty($bicicletas)){
            ?>
                <section>
                    <p>Não há bicicletas cadastradas.</p>
                </section>
            <?php
        } else {
             echo "<h2>Listagem de bicicletas:</h2>";
        
            foreach($bicicletas as $bicicleta=>$value){
                ?>
               
                    
                    <p>Marca: <?php echo htmlspecialchars($value['marca']); ?></p>
                    <p>Modelo: <?php echo htmlspecialchars($value['modelo']); ?></p>
                    <p>Aro: <?php echo htmlspecialchars($value['aro']); ?></p>    
                
                <?php
            }
        }
    ?>
</main>
</body>
</html>
