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

    $retorno=$atividadesDAO->buscarAtividadePorId($atividades);

    require_once('../indexAtividades.php');
}  

if (isset($_POST['editar'])) {
    $codAtividades = $_POST['codAtividades'];
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $distancia = $_POST['distancia'];
    $tempo = $_POST['tempo'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    $atividades = new Atividades();
    $atividades->setCodAtividades($codAtividades);
    $atividades->setTitulo($titulo);
    $atividades->setLocal($local);
    $atividades->setDistancia($distancia);
    $atividades->setTempo($tempo);
    $atividades->setData($data);
    $atividades->setDescricao($descricao);

    $atividadesDAO = new AtividadesDAO();
    if ($atividadesDAO->alterarAtividades($atividades)) {
        echo "<script>alert('Atividade alterada com sucesso');</script>";
        header("Location: ../indexAtividades.php");
        exit();
    } else {
        echo "<script>alert('Erro ao alterar atividade');</script>";
    }
}


# DELETAR ATIVIDADES
if (isset($_POST['deletar'])) {
    $codAtividades = $_POST['codAtividades'];

    $atividades = new Atividades();
    $atividades->setCodAtividades($codAtividades);

    $atividadesDAO = new AtividadesDAO();
    if ($atividadesDAO->deletarAtividades($atividades)) {
        echo "<script>alert('Atividade deletada com sucesso');</script>";
        header("Location: ../indexAtividades.php");
        exit();
    } else {
        echo "<script>alert('Erro ao deletar atividade');</script>";
    }
}


?>
