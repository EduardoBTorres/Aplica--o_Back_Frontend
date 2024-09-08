<?php
session_start();
require_once('Usuario.php');
require_once('UsuarioDAO.php');

# CADASTRO USUARIO
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setCpf($cpf);
    $usuario->setSenha($senha);

    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->inserirUsuario($usuario)) {
        echo "<script>alert('Usuário cadastrado com sucesso');</script>";
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Erro ao cadastrar usuário');</script>";
    }
}

# LOGIN USUARIO
if(isset($_POST['entrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario=new Usuario();
    $usuario->setemail($email);
    $usuario->setsenha($senha);

    $usuarioDAO= new UsuarioDAO();

    $retorno=$usuarioDAO->acessarUsuario($usuario);

    if($retorno){
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['codUsuario'] = $retorno['codUsuario'];
        $_SESSION['nome'] = $retorno['nome'];
        header('location:../pag_inicial.php');
    }
    else{
        header('location:../index.php');
    }
}

# SAIR
if (isset($_POST['sair'])) {
    session_start();
    session_destroy();
    header('Location: ../index.php');
    exit;
}

# EDITAR USUARIO
if(isset($_POST['editar'])){
    
    $codUsuario = $_POST['editar'];

    $usuario=new Usuario();

    $usuario->setcodUsuario($codUsuario);

    $usuarioDAO= new UsuarioDAO();

    $retorno=$usuarioDAO->buscarUsuario($usuario);

    require_once('../editarPerfil.php');
}  

#ALTERAR Usuario
if(isset($_POST['editar'])){
    
    $codUsuario = $_POST['codUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];    

    $usuario=new Usuario();
    $usuario->setnome($nome);
    $usuario->setemail($email);
    $usuario->setcpf($cpf);
    $usuario->setsenha($senha);
    $usuario->setcodUsuario($codUsuario);

    $usuarioDAO= new UsuarioDAO();



    $retorno=$usuarioDAO->alterarUsuario($usuario);

    header('location:../pag_inicial.php');
}

# DELETAR USUARIO
if (isset($_POST['deletar'])) {
    $codUsuario = $_SESSION['codUsuario'];

    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->deletarUsuario($codUsuario)) {
        session_destroy();
        echo "<script>alert('Conta deletada com sucesso');</script>";
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Erro ao deletar conta');</script>";
    }
}


#ALTERAR PERFIL
if(isset($_POST['alterarPerfil'])){
 
    session_start();

    $codUsuario = $_POST['codUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];  
    $imagem = $_POST['imagem'];  

    $usuario=new Usuario();
    $usuario->setnome($nome);
    $usuario->setemail($email);
    $usuario->setcpf($cpf);
    $usuario->setsenha($senha);
    $usuario->setcodUsuario($codUsuario);
    $usuario->setImagem($imagem);

    $usuarioDAO= new UsuarioDAO();

    $retorno=$usuarioDAO->alterarUsuario($usuario);

    $_SESSION['nome'] = $nome;
    echo $_SESSION['nome'];
    header('location:../editarPerfil.php');
}
?>
