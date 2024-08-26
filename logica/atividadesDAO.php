<?php
   Class AtividadesDAO{
    private $conexao;

    public function __construct() {
           try {
            $this->conexao = new PDO("mysql:host=localhost; dbname=projeto_backend; charset=utf8", "root","");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
            }
    }

    function inserirAtividades($atividades){
        try {
            $query = $this->conexao->prepare("
                INSERT INTO atividades (titulo, local, distancia, tempo, data, descricao) 
                VALUES (:titulo, :local, :distancia, :tempo, :data, :descricao)
            ");
    
            $resultado = $query->execute([
                'titulo' => $atividades->gettitulo(),
                'local' => $atividades->getlocal(),
                'distancia' => $atividades->getdistancia(),
                'tempo' => $atividades->gettempo(),
                'data' => $atividades->getdata(),
                'descricao' => $atividades->getdescricao()
            ]);
    
            return $resultado;
    
        } catch(PDOException $e) {
            // Log de erro ou redirecionamento para uma página de erro
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }
    


    function alterarAtividades($atividades){
        try {
            $query = $this->conexao->prepare("UPDATE atividades set titulo= :titulo, local = :local, distancia= :distancia, tempo= :tempo, descricao= :descricao where codAtividades = :codAtividades");
            $resultado = $query->execute(['titulo' => $atividades->gettitulo(),'local' => $atividades->getlocal(),'distancia' => $atividades->getdistancia(),'tempo' => $atividades->gettempo(), 'descricao' => $atividades->getdescricao(), 'codAtividades' => $atividades->getcodAtividades()]);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarAtividades($atividades){
        try {
            $query = $this->conexao->prepare("DELETE from atividades where codAtividades = :codAtividades");
            $resultado = $query->execute(['codAtividades' => $atividades->getcodAtividades()]);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

     function buscarAtividades($atividades){
        try {
        $query = $this->conexao->prepare("SELECT * from atividades where codAtividades=:codAtividades");
        if($query->execute(['codAtividades' => $atividades->getcodAtividades()])){
            $atividades = $query->fetch(); //coloca os dados num array $atividades
            return $atividades;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function acessarAtividades($atividades){
        try {
        $query = $this->conexao->prepare("SELECT * from atividades where local=:local and tempo=:tempo");
        if($query->execute(['local' => $atividades->getlocal(), 'tempo' => $atividades->gettempo()])){
            $atividades = $query->fetch(); //coloca os dados num array $atividades
          if ($atividades)
            {  
                return $atividades;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }
   }
   ?>