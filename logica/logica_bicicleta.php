<?php
    require_once('atividades.php');
    require_once('atividadesDAO.php');
    
    if (isset($_POST['cadastrar'])) {
        // Validação e sanitização dos dados de entrada
        $titulo = filter_var(trim($_POST['titulo']), FILTER_SANITIZE_STRING);
        $local = filter_var(trim($_POST['local']), FILTER_SANITIZE_STRING);
        $distancia = filter_var(trim($_POST['distancia']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $tempo = filter_var(trim($_POST['tempo']), FILTER_SANITIZE_NUMBER_INT);
        $data = $_POST['data'];  // Se for uma data válida, sem sanitização por enquanto
        $descricao = filter_var(trim($_POST['descricao']), FILTER_SANITIZE_STRING);
    
        // Criação do objeto Atividades
        $atividades = new Atividades();
        $atividades->settitulo($titulo);
        $atividades->setlocal($local);
        $atividades->setdistancia($distancia);
        $atividades->settempo($tempo);
        $atividades->setdata($data);
        $atividades->setdescricao($descricao);
    
        // Inserção da atividade no banco de dados
        $atividadesDAO = new AtividadesDAO();
        $retorno = $atividadesDAO->inserirAtividades($atividades);
    
        if ($retorno) {
            header('Location: ../indexAtividades.php');
            exit;
        } else {
            echo "Erro ao cadastrar atividade.";
        }
    }


#EDITAR Atividades
    if(isset($_POST['editar'])){
    
                $codAtividades = $_POST['editar'];

                $atividades=new Atividades();

                $atividades->setcodAtividades($codAtividades);

                $atividadesDAO= new AtividadesDAO();

                $retorno=$atividadesDAO->buscarAtividades($atividades);

                require_once('../editarPerfil.php');
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
            $atividades->setdata($data);
            $atividades->setdescricao($descricao);
            $atividades->setcodAtividades($codAtividades);

            $atividadesDAO= new AtividadesDAO();



            $retorno=$atividadesDAO->alterarAtividades($atividades);

            header('location:../pag_inicial.php');
    }
#DELETAR Atividades
    if(isset($_POST['deletar'])){
        $codAtividades = $_POST['deletar'];

                $atividades=new Atividades();

                $atividades->setcodAtividades($codAtividades);

                $atividadesDAO= new AtividadesDAO();

                $retorno=$atividadesDAO->deletarAtividades($atividades);
       

        header('Location:../indexAtividades.php');
    }

#ALTERAR PERFIL
    if(isset($_POST['alterarAtividades'])){
 
            session_start();

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
            $atividades->setdata($data);
            $atividades->setdescricao($descricao);
            $atividades->setcodAtividades($codAtividades);

            $atividadesDAO= new AtividadesDAO();

            $retorno=$atividadesDAO->alterarAtividades($atividades);

            $_SESSION['nome'] = $nome;
            echo $_SESSION['nome'];
            header('location:../editarPerfil.php');
    }
?>