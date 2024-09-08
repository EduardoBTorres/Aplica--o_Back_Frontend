<?php
require_once('bicicleta.php');
class BicicletaDAO {
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=localhost;dbname=biketracker;charset=utf8", "root", "");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function inserirBicicleta(Bicicleta $bicicleta) {
        $sql = "INSERT INTO bicicleta (marca, modelo, aro, cor, codUsuario) VALUES (:marca, :modelo, :aro, :cor, :codUsuario)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':marca', $bicicleta->getMarca());
        $stmt->bindValue(':modelo', $bicicleta->getModelo());
        $stmt->bindValue(':aro', $bicicleta->getAro());
        $stmt->bindValue(':cor', $bicicleta->getCor());
        $stmt->bindValue(':codUsuario', $bicicleta->getCodUsuario(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function buscarBicicletaPorId($id) {
        $sql = "SELECT * FROM bicicletas WHERE cod_bicicleta = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $bicicleta = new Bicicleta();
            $bicicleta->setCodBicicleta($data['cod_bicicleta']);
            $bicicleta->setMarca($data['marca']);
            $bicicleta->setModelo($data['modelo']);
            $bicicleta->setAro($data['aro']);
            $bicicleta->setCor($data['cor']);
            $bicicleta->setCodUsuario($data['cod_usuario']);
            return $bicicleta;
        }
        return null;
    }

    public function atualizarBicicleta(Bicicleta $bicicleta) {
        $sql = "UPDATE bicicletas SET marca = :marca, modelo = :modelo, aro = :aro, cor = :cor WHERE cod_bicicleta = :cod_bicicleta";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':marca', $bicicleta->getMarca());
        $stmt->bindParam(':modelo', $bicicleta->getModelo());
        $stmt->bindParam(':aro', $bicicleta->getAro());
        $stmt->bindParam(':cor', $bicicleta->getCor());
        $stmt->bindParam(':cod_bicicleta', $bicicleta->getCodBicicleta(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deletarBicicleta($id) {
        $sql = "DELETE FROM bicicletas WHERE cod_bicicleta = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


public function buscarBicicletaPorUsuario($codUsuario) {
    $sql = "SELECT * FROM bicicleta WHERE codUsuario = :codUsuario";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindParam(':codUsuario', $codUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $data;
}
}
?>
