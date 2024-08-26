<?php
    require_once('Usuario.php');
    require_once('UsuarioDAO.php'); 
    //require_once('config_upload.php');

#CADASTRO USUARIO
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $nome_arquivo=$_FILES['imagem']['name'];  
        $tamanho_arquivo=$_FILES['imagem']['size']; 
        $arquivo_temporario=$_FILES['imagem']['tmp_name']; 
       if (!empty($nome_arquivo)){

        if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
            die("Arquivo já existe");

        if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes))  
            die("Arquivo deve ter o no máximo $tamanho_bytes bytes");

        $ext = strrchr($nome_arquivo,'.');
        if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
            die("Extensão de arquivo inválida para upload");

        if (move_uploaded_file($arquivo_temporario, "../imagens/$nome_arquivo")) {
                echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso <br>";


                $usuario=new Usuario();
                $usuario->setnome($nome);
                $usuario->setemail($email);
                $usuario->setcpf($cpf);
                $usuario->setsenha($senha);
                $usuario->setimagem($nome_arquivo);

                $usuarioDAO= new UsuarioDAO($usuario);
                $retorno=$usuarioDAO->inserirUsuario($usuario);
                header('location:../index.php');
         }
    }
}
#ENTRAR
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

#SAIR
    if(isset($_POST['sair'])){
            session_start();
            session_destroy();
            header('location:../index.php');
            exit;
    }

#EDITAR Usuario
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
#DELETAR Usuario
    if(isset($_POST['deletar'])){
        $codUsuario = $_POST['deletar'];

                $usuario=new Usuario();

                $usuario->setcodUsuario($codUsuario);

                $usuarioDAO= new UsuarioDAO();

                $retorno=$usuarioDAO->deletarUsuario($usuario);
       

        header('Location:../index.php');
    }

#ALTERAR PERFIL
    if(isset($_POST['alterarPerfil'])){
 
            session_start();

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

            $_SESSION['nome'] = $nome;
            echo $_SESSION['nome'];
            header('location:../editarPerfil.php');
    }
?>