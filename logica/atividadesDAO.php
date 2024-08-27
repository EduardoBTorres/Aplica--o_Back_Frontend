<?php
class AtividadesDAO {
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=localhost; dbname=projeto_backend; charset=utf8", "root", "");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function inserirAtividades($atividades) {
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
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    function alterarAtividades($atividades) {
        try {
            $query = $this->conexao->prepare("
                UPDATE atividades 
                SET titulo = :titulo, local = :local, distancia = :distancia, tempo = :tempo, descricao = :descricao 
                WHERE codAtividades = :codAtividades
            ");

            $resultado = $query->execute([
                'titulo' => $atividades->gettitulo(),
                'local' => $atividades->getlocal(),
                'distancia' => $atividades->getdistancia(),
                'tempo' => $atividades->gettempo(),
                'descricao' => $atividades->getdescricao(),
                'codAtividades' => $atividades->getcodAtividades()
            ]);

            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    function deletarAtividades($atividades) {
        try {
            $query = $this->conexao->prepare("
                DELETE FROM atividades 
                WHERE codAtividades = :codAtividades
            ");

            $resultado = $query->execute(['codAtividades' => $atividades->getcodAtividades()]);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    function buscarAtividades($atividades) {
        try {
            $query = $this->conexao->prepare("
                SELECT * FROM atividades 
                WHERE codAtividades = :codAtividades
            ");

            if ($query->execute(['codAtividades' => $atividades->getcodAtividades()])) {
                return $query->fetch();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    function acessarAtividades($atividades) {
        try {
            $query = $this->conexao->prepare("
                SELECT * FROM atividades 
                WHERE local = :local AND tempo = :tempo
            ");

            if ($query->execute(['local' => $atividades->getlocal(), 'tempo' => $atividades->gettempo()])) {
                $result = $query->fetch();
                return $result ? $result : false;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    function listarAtividades() {
        try {
            $query = $this->conexao->prepare("SELECT * FROM atividades");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
?>
