<?php
session_start();
require_once('Bicicleta.php');
require_once('BicicletaDAO.php');

# CADASTRO BICICLETA
if (isset($_POST['cadastrar'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $aro = $_POST['aro'];
    $cor = $_POST['cor'];

    $codUsuario = $_SESSION['codUsuario'];
    $bicicleta = new Bicicleta();
    $bicicleta->setMarca($marca);
    $bicicleta->setModelo($modelo);
    $bicicleta->setAro($aro);
    $bicicleta->setCor($cor);
    $bicicleta->setCodUsuario($codUsuario);

    $bicicletaDAO = new BicicletaDAO();
    if ($bicicletaDAO->inserirBicicleta($bicicleta)) {
        echo "<script>alert('Usuário cadastrado com sucesso');</script>";
        header("Location: ../formAtividades.php");
        exit;
    } else {
        echo "<script>alert('Erro ao cadastrar usuário');</script>";
    }
}

# EDITAR BICICLETA
if (isset($_POST['editar'])) {
    $codBicicleta = $_POST['editar'];

    $bicicleta = new Bicicleta();
    $bicicleta->setcodBicicleta($codBicicleta);

    $bicicletaDAO = new BicicletaDAO();
    $retorno = $bicicletaDAO->buscarBicicletaPorId($codBicicleta);

    if ($retorno) {
        require_once('../indexBicicleta.php');
    } else {
        echo "<script>alert('Bicicleta não encontrada');</script>";
    }
}



#ALTERAR Bicicleta
if (isset($_POST['editar'])) {
    $codBicicleta = $_POST['codBicicleta'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $aro = $_POST['aro'];
    $cor = $_POST['cor'];

    $bicicleta = new Bicicleta();
    $bicicleta->setmarca($marca);
    $bicicleta->setmodelo($modelo);
    $bicicleta->setaro($aro);
    $bicicleta->setcor($cor);
    $bicicleta->setcodBicicleta($codBicicleta);

    $bicicletaDAO = new BicicletaDAO();
    $retorno = $bicicletaDAO->atualizarBicicleta($bicicleta);

    header('Location: ../listagemBicicleta.php');
}



# DELETAR BICICLETA
if (isset($_POST['deletar'])) {
    $codBicicleta = $_POST['codBicicleta'];  // Correto, pegando do POST

    $bicicletaDAO = new BicicletaDAO();
    if ($bicicletaDAO->deletarBicicleta($codBicicleta)) {
        header("Location: ../listagemBicicleta.php");
        exit;
    } else {
        echo "<script>alert('Erro ao deletar bicicleta');</script>";
    }
}


?>
