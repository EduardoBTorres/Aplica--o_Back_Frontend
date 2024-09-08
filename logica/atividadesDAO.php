<?php
class AtividadesDAO {
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=localhost; dbname=biketracker; charset=utf8", "root", "");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function inserirAtividades($atividades) {
        try {
            $query = $this->conexao->prepare("
                INSERT INTO atividades (titulo, local, distancia, tempo, data, descricao, codUsuario, codBicicleta) 
                VALUES (:titulo, :local, :distancia, :tempo, :data, :descricao, :codUsuario, :codBicicleta);
            ");

            $resultado = $query->execute([
                'titulo' => $atividades->getTitulo(),
                'local' => $atividades->getLocal(),
                'distancia' => $atividades->getDistancia(),
                'tempo' => $atividades->getTempo(),
                'data' => $atividades->getData(),
                'descricao' => $atividades->getDescricao(),
                'codUsuario' => $atividades->getCodUsuario(),
                'codBicicleta' => $atividades->getCodBicicleta()
            ]);

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    

    function alterarAtividades($atividades) {
        try {
            $query = $this->conexao->prepare("
                UPDATE atividades 
                SET titulo = :titulo, local = :local, distancia = :distancia, tempo = :tempo, descricao = :descricao, data = :data
                WHERE codAtividades = :codAtividades
            ");

            $resultado = $query->execute([
                'titulo' => $atividades->getTitulo(),
                'local' => $atividades->getLocal(),
                'distancia' => $atividades->getDistancia(),
                'tempo' => $atividades->getTempo(),
                'descricao' => $atividades->getDescricao(),
                'data' => $atividades->getData(),
                'codAtividades' => $atividades->getCodAtividades()
            ]);

            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    function deletarAtividades($atividades) {
        try {
            $query = $this->conexao->prepare(" DELETE FROM atividades 
                WHERE codAtividades = :codAtividades
            ");

            $resultado = $query->execute(['codAtividades' => $atividades->getCodAtividades()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    function buscarAtividadePorId($codAtividades) {
        try {
            $query = $this->conexao->prepare("SELECT * FROM atividades WHERE codAtividades = :codAtividades");
            $query->execute(['codAtividades' => $codAtividades]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    

    function listarAtividades($codUsuario) {
        try {
            $query = $this->conexao->prepare("SELECT * FROM atividades JOIN bicicleta on atividades.codBicicleta = bicicleta.codBicicleta WHERE atividades.codUsuario = :codUsuario");
            $query->execute(['codUsuario' => $codUsuario]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
} 
?>
