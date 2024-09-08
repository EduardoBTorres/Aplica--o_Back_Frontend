<?php
session_start();
require_once('Atividades.php');
require_once('AtividadesDAO.php');

# CADASTRO ATIVIDADES
if (isset($_POST['cadastrar'])) {
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $distancia = $_POST['distancia'];
    $tempo = $_POST['tempo'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];
    $codUsuario = $_SESSION['codUsuario'];
    $codBicicleta = $_POST['codBicicleta'];

    $atividades = new Atividades();
    $atividades->setTitulo($titulo);
    $atividades->setLocal($local);
    $atividades->setDistancia($distancia);
    $atividades->setTempo($tempo);
    $atividades->setData($data);
    $atividades->setDescricao($descricao);
    $atividades->setCodUsuario($codUsuario);
    $atividades->setCodBicicleta($codBicicleta);



    $atividadesDAO = new AtividadesDAO();
    if ($atividadesDAO->inserirAtividades($atividades)) {
        echo "<script>alert('Usuário cadastrado com sucesso');</script>";
        header("Location: ../indexAtividades.php");
        exit;
    } else {
        echo "<script>alert('Erro ao cadastrar usuário');</script>";
    }
}

# EDITAR ATIVIDADES
if(isset($_POST['editar'])){
    
    $codAtividades = $_POST['editar'];

    $atividades=new Atividades();

    $atividades->setcodAtividades($codAtividades);

    $atividadesDAO= new AtividadesDAO();

    $retorno=$atividadesDAO->buscarAtividades($atividades);

    require_once('../indexAtividades.php');
}  

#ALTERAR Atividades
if(isset($_POST['editar'])){
    
    $codAtividades = $_POST['codAtividades'];
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $distancia = $_POST['distancia'];
    $tempo = $_POST['tempo'];  
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];  

    $atividades=new Atividades();
    $atividades->settitulo($titulo);
    $atividades->setlocal($local);
    $atividades->setdistancia($distancia);
    $atividades->settempo($tempo);
    $atividades->setData($data);
    $atividades->setDescricao($descricao);
    $atividades->setcodAtividades($codAtividades);

    $atividadesDAO= new AtividadesDAO();



    $retorno=$atividadesDAO->alterarAtividades($atividades);

    header('location:../indexAtividades.php');
}

# DELETAR ATIVIDADES
if (isset($_POST['deletar'])) {
    $codAtividades = $_SESSION['codAtividades'];

    $atividadesDAO = new AtividadesDAO();
    if ($atividadesDAO->deletarAtividades($codAtividades)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Erro ao deletar conta');</script>";
    }
}

?>
