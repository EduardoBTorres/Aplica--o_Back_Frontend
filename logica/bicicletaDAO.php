<?php
   Class BicicletaDAO{
    private $conexao;

    public function __construct() {
           try {
            $this->conexao = new PDO("mysql:host=localhost; dbname=projeto_backend; charset=utf8", "root","");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
            }
    }

    function inserirBicicleta($bicicleta){
       try {
            $query = $this->conexao->prepare("INSERT into bicicleta (marca, modelo, aro) values (:marca, :modelo, :aro)");

            $resultado = $query->execute(['marca' => $bicicleta->getmarca(),'modelo' => $bicicleta->getmodelo(),'aro' => $bicicleta->getaro()]);
            
            return $resultado;
            
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    function alterarBicicleta($bicicleta){
        try {
            $query = $this->conexao->prepare("UPDATE bicicleta set marca= :marca, modelo = :modelo, aro= :aro, senha= :senha where codBicicleta = :codBicicleta");
            $resultado = $query->execute(['marca' => $bicicleta->getmarca(),'modelo' => $bicicleta->getmodelo(),'aro' => $bicicleta->getaro(),'codBicicleta' => $bicicleta->getcodBicicleta()]);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarBicicleta($bicicleta){
        try {
            $query = $this->conexao->prepare("DELETE from bicicleta where codBicicleta = :codBicicleta");
            $resultado = $query->execute(['codBicicleta' => $bicicleta->getcodBicicleta()]);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

     function buscarBicicleta($bicicleta){
        try {
        $query = $this->conexao->prepare("SELECT * from bicicleta where codBicicleta=:codBicicleta");
        if($query->execute(['codBicicleta' => $bicicleta->getcodBicicleta()])){
            $bicicleta = $query->fetch(); //coloca os dados num array $bicicleta
            return $bicicleta;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function acessarBicicleta($bicicleta){
        try {
        $query = $this->conexao->prepare("SELECT * from bicicleta where modelo=:modelo and aro=:aro");
        if($query->execute(['modelo' => $bicicleta->getmodelo(), 'aro' => $bicicleta->getaro()])){
            $bicicleta = $query->fetch(); //coloca os dados num array $bicicleta
          if ($bicicleta)
            {  
                return $bicicleta;
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