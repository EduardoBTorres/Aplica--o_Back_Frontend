<?php
    require_once('bicicleta.php');
    require_once('bicicletaDAO.php');
    
    if (isset($_POST['cadastrar'])) {
        // Validação e sanitização dos dados de entrada
        $marca = filter_var(trim($_POST['marca']), FILTER_SANITIZE_STRING);
        $modelo = filter_var(trim($_POST['modelo']), FILTER_SANITIZE_STRING);
        $aro = filter_var(trim($_POST['aro']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
       
        // Criação do objeto Bicicleta
        $bicicleta = new Bicicleta();
        $bicicleta->setmarca($marca);
        $bicicleta->setmodelo($modelo);
        $bicicleta->setaro($aro);
    
        // Inserção da atividade no banco de dados
        $bicicletaDAO = new BicicletaDAO();
        $retorno = $bicicletaDAO->inserirBicicleta($bicicleta);
    
        if ($retorno) {
            header('Location: ../listagemBicicleta.php');
            exit;
        } else {
            echo "Erro ao cadastrar atividade.";
        }
    }


#EDITAR Bicicleta
    if(isset($_POST['editar'])){
    
                $codBicicleta = $_POST['editar'];

                $bicicleta=new Bicicleta();

                $bicicleta->setcodBicicleta($codBicicleta);

                $bicicletaDAO= new BicicletaDAO();

                $retorno=$bicicletaDAO->buscarBicicleta($bicicleta);

                require_once('../editarPerfil.php');
    }    

#ALTERAR Bicicleta
    if(isset($_POST['editar'])){
    
            $codBicicleta = $_POST['codBicicleta'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $aro = $_POST['aro'];

            $bicicleta=new Bicicleta();
            $bicicleta->setmarca($marca);
            $bicicleta->setmodelo($modelo);
            $bicicleta->setaro($aro);

            $bicicletaDAO= new BicicletaDAO();

            $retorno=$bicicletaDAO->alterarBicicleta($bicicleta);

            header('location:../pag_inicial.php');
    }
#DELETAR Bicicleta
    if(isset($_POST['deletar'])){
        $codBicicleta = $_POST['deletar'];

                $bicicleta=new Bicicleta();

                $bicicleta->setcodBicicleta($codBicicleta);

                $bicicletaDAO= new BicicletaDAO();

                $retorno=$bicicletaDAO->deletarBicicleta($bicicleta);
       

        header('Location:../indexBicicleta.php');
    }

#ALTERAR PERFIL
    if(isset($_POST['alterarBicicleta'])){
 
            session_start();

            $codBicicleta = $_POST['codBicicleta'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $aro = $_POST['aro'];
        
            $bicicleta=new Bicicleta();
            $bicicleta->setmarca($marca);
            $bicicleta->setmodelo($modelo);
            $bicicleta->setaro($aro);

            $bicicletaDAO= new BicicletaDAO();

            $retorno=$bicicletaDAO->alterarBicicleta($bicicleta);

            $_SESSION['nome'] = $nome;
            echo $_SESSION['nome'];
            header('location:../editarPerfil.php');
    }
?>